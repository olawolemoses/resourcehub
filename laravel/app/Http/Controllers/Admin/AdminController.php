<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    
    public function __construct(){
        
        $this->middleware('guest');
    }
    public function index(){
        
        return view('admin.index');
    }
    
    public function show(Request $request)
    {
        //return dd($request->all());
        $request->validate([
         'username' => 'bail|email|required',
         'password' => 'bail|min:6|required',
        ]);
        
       // return dd(request('password'));
       $username = request('username');
       $password = request('password');
       
       //return dd(Auth::attempt(['username' => $username,'password' => $password ]));
        if(Auth::attempt(['username' => request('username'),'password'=>request('password'),'status' => 1,'user_type' => 0]))
        {
            return redirect()->route('admin-dashboard');
        }else{
            return back()->withErrors(['message' => 'Error logging you in']);
        }
        
    }
    
    public function destroy()
    {
        \Auth::logout();
        return redirect()->route('admin');
    }
}
