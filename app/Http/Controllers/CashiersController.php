<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class CashiersController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $cashiers = User::where('role_id',4)->get();
            return Datatables::of($cashiers)
                ->addColumn('action', function ($cashier) {
                    return view('cashiers.partials.action', [
                        'cashier' => $cashier
                ]);
            })
            ->make(true);
        }
        return view('cashiers.index');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'     => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $role     = Role::where('name', 'cashier')->first();
        $cashiers = User::create([
            'name'      => request('name'), 
            'username'  => request('username'), 
            'password'  => bcrypt(request('password')), 
        ]);
        $cashiers->role()->associate($role)->save();
        return response()->json($cashiers);
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
    public function edit(User $cashier)
    {
        return view('cashiers.edit', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cashier)
    {
        $this->validate(request(),[
            'name'                      => 'required',
            'username'                  => 'required',
            'password'                  => 'required_if:password,value|confirmed',
            'password_confirmation'     => 'required_if:password,value'
        ]);

        if ($request->password != null) {
            $cashier->update([
                'password'     => bcrypt(request('password')),
            ]);
        }
         $cashier->update([
            'name'         => request('name'),
            'username'     => request('username')
        ]);
        return back()->with('info', 'Cashier has been updated!');
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
