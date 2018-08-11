<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
       // $users =  User::all();
       // $users = $users->except(['user_type' => 0]);
      $users = User::where('user_type','=',1 || 2)->paginate(15);
      return view('admin.users',compact('users'));
    }
    
 
    public function show($id){
        
    $user = User::find($id); 
    if($user->user_type == 2){
        
     return view('admin.editmerchant',compact('user'));
    }else if($user->user_type == 1){
      
      return view('admin.editcustomer',compact('user'));          
    }else{
         return view('admin.account-settings',compact('user'));
    }
    
    }
    public function update(Request $request)
    {
       // return dd($request->all());
        $request->validate([
           'user_id' => 'required',    
           'first_name' => 'bail|required',
           'last_name' => 'bail|required',
           'username' => 'bail|required|email',
           'password' => 'nullable|min:6',
        ]);
        
        if($password = request('password') != null)
        {
        $user = User::where('id','=',request('user_id'))->update([
            'firstname' => request('first_name'),
            'lastname' => request('last_name'),
            'username' => request('username'),
            'password' =>Hash::make(request('password')),
            ]);}else
            {
             $user = User::where('id','=',request('user_id'))->update([
            'firstname' => request('first_name'),
            'lastname' => request('last_name'),
            'username' => request('username'),
           // 'password' =>Hash::make(request('password')),
            ]); 
            }
            ;
        if($user){
            
            return back()->with("success","User successfully updated");
        }else{
            return back()->withErrors();
        }
    }
    
    public function destroy(Request $request)
    {
        $user = User::find(request('user_id'))->update([
            'status'=>0,
            ]);
        
        if($user == True)
        {
            return back()->with('success','User deactivated');
        }else
        {
            return back()->withErrors();
        }
      //  return back()->with('success','User deactivated');
        //return dd($request->all());
    }
}
