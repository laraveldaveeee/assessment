<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class AdminAideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $adminAides = User::where('role_id', 7)->get();
            return Datatables::of($adminAides)
                ->addColumn('action', function ($adminAide) {
                    return view('admin-aide.partials.action', compact('adminAide'));
                })
                ->make(true);
        }
        return view('admin-aide.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $role  = Role::where('name', 'admin aide')->first();
        $adminAide = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);
        $adminAide->role()->associate($role)->save();
        return response()->json($adminAide);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $adminAide)
    {
        return view('admin-aide.edit', compact('adminAide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $adminAide)
    {
        $this->validate(request(),[
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $role  = Role::where('name', 'admin aide')->first();
        $adminAide->update([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);

        $adminAide->role()->associate($role)->save();
        return redirect('/admin-aide')->with('success', 'Admin Aide has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
