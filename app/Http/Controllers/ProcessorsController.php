<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\DataTables\DataTables;
class ProcessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $processors = User::where('role_id', 6)->get();
            return Datatables::of($processors)
                ->addColumn('action', function ($processor) {
                    return view('processors.partials.action', compact('processor'));
                })
                ->make(true);
        }
        return view('processors.index');
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
        $role  = Role::where('name', 'processor')->first();
        $processor = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt(request('password'))
        ]);
        $processor->role()->associate($role)->save();
        return response()->json($processor);
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
    public function edit(User $processor)
    {
        return view('processors.edit', compact('processor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $processor)
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
         $processor->update([
            'name'         => request('name'),
            'username'     => request('username')
        ]);
        return back()->with('info', 'Processor has been updated!');
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
