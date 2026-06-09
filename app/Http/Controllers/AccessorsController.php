<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class AccessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $accessors = User::where('role_id', 3)->get();
            return Datatables::of($accessors)
                ->addColumn('action', function ($accessor) {
                    return view('accessors.partials.action', compact('accessor'));
                })
                ->make(true);
        }
        return view('accessors.index');
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
        $role      = Role::where('name', 'assessor')->first();
        $accessors = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt($request->password)
        ]);
        $accessors->role()->associate($role)->save();
        return response()->json($accessors);
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
    public function edit(User $accessor)
    {
        return view('accessors.edit', compact('accessor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $accessor)
    {
        $this->validate(request(),[
            'name'                      => 'required',
            'username'                  => 'required',
            'password'                  => 'required_if:password,value|confirmed',
            'password_confirmation'     => 'required_if:password,value'

        ]);

        if ($request->password != null) {
            //auth()->user()->update(); 
            $accessor->update([
                'password'     => bcrypt(request('password')),
            ]);
        }
         $accessor->update([
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
