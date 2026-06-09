<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SettingsController extends Controller
{
    public function index() 
    {
    	return view('settings.index');
    }
    public function update(Request $request)
    {
    	$this->validate(request(),[
            'name'                  => 'required',
            'username'              => 'required',
            'password'              => 'required_if:password,value|confirmed',
            'password_confirmation' => 'required_if:password,value',
        ]);
        if ($request->password != null) { 
            auth()->user()->update([
                'password'           => bcrypt(request('password'))
            ]);
        }
        $origFilename  = $request->avatar;
        if (request()->hasFile('avatar')) {
            $file      = $request->file('avatar');
            $extension = $file->extension();
            $filename  = time() . '-' . str_slug($origFilename) . '.' . $extension;
            $path  	   = $file->storeAs('public/avatar', $filename);
            auth()->user()->update([
                'avatar'  => $path
            ]);
        }
        auth()->user()->update([
            'name'      	=> $request->name,
            'username'     	=> $request->username,
        ]);
	    return back()->with('info', "User has been changed!");  
    }
}
