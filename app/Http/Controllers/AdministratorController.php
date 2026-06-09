<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class AdministratorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          if (request()->ajax()) {
            $administrators = User::where('role_id', 1)->get();
            return Datatables::of($administrators)
                ->addColumn('action', function ($administrator) {
                    return view('admin.partials.action', compact('administrator'));
                })
                ->make(true);
        }
        return view('admin.index');
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
        $role  = Role::where('name', 'administrator')->first();
        $admin = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);
        $admin->role()->associate($role)->save();
        return response()->json($admin);
       // return back()->with('success', 'Admin has been added!');
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
    public function edit(User $administrator)
    {
        return view('admin.edit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $administrator)
    {
        $this->validate(request(),[
            'name'                      => 'required',
            'username'                  => 'required',
            'password'                  => 'required_if:password,value|confirmed',
            'password_confirmation'     => 'required_if:password,value'
        ]);
        if ($request->password != null) {
            auth()->user()->update([
                'password'     => bcrypt(request('password')),
            ]);
        }
        $administrator->update([
            'name'         => request('name'),
            'username'     => request('username')
        ]);
        return back()->with('info', 'Administrator has been updated!');
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
