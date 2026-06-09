<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class AccountingController extends Controller
{
    public function index()
    {
         if (request()->ajax()) {
            $accountings  = User::where('role_id', 5);
            return Datatables::of($accountings)
                ->addColumn('action', function ($accounting) {
                    return view('accounting.partials.action', compact('accounting'));
                })
                ->make(true);
        }
    	return view('accounting.index');
    }

    public function store(Request $request)
    {
    	$this->validate(request(),[
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $role       = Role::where('name', 'accounting')->first();
        $accounting = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);
        $accounting->role()->associate($role)->save();
        return response()->json($accounting);
    }

    public function edit(User $accounting)
    {
        return view('accounting.edit', compact('accounting'));
    } 

    public function updateAccounting(Request $request, User $accounting)
    {
        $this->validate(request(),[
            'name'                      => 'required',
            'username'                  => 'required',
            'password'                  => 'required_if:password,value|confirmed',
            'password_confirmation'     => 'required_if:password,value'
        ]);

        if ($request->password != null) {
            $accounting->update([
                'password'     => bcrypt(request('password')),
            ]);
        }
         $accounting->update([
            'name'         => request('name'),
            'username'     => request('username')
        ]);
        // return $accounting;
        return back()->with('info', 'Accounting has been updated!');
    }
}
