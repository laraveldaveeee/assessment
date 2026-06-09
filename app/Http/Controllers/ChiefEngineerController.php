<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class ChiefEngineerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
    	    $chiefEngineers = User::where('role_id', 2)->get();
            return Datatables::of($chiefEngineers)
                ->addColumn('action', function ($chiefEngineer) {
                    return view('chief-engineers.partials.action', compact('chiefEngineer'));
                })
                ->make(true);
        }
    	return view('chief-engineers.index');
    }

    public function store(Request $request) 
    {
    	 $this->validate(request(),[
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $role  			= Role::where('name', 'chief engineer')->first();
        $chiefEngineer  = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);
        $chiefEngineer->role()->associate($role)->save();
        return response()->json($chiefEngineer);
    }

    public function edit(User $chiefEngineer)
    {
    	return view('chief-engineers.edit', compact('chiefEngineer'));
    }

    public function update(Request $request, User $chiefEngineer)
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
        $chiefEngineer->update([
            'name'         => request('name'),
            'username'     => request('username')
        ]);
        return back()->with('info', 'Administrator has been updated!');
    }
}
