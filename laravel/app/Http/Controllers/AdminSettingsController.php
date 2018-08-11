<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSettingsController extends Controller
{
    //
    
    public function __construct(){
        
        $this->middleware('auth');
        
    }
    
    public function index($id){
        
       $admin = Admin::find($id);
       $user_id = $admin->user_id;
       $user =  User::where('id','=',$user_id)->first();
        return view('admin.account-settings',compact('admin','user'));
    }
    public function store(Request $request){
        
    
     $request->validate([
         'admin_id' => 'required',
         'user_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'new_password' => 'confirmed|required',
        ]); 
        
       // $admin_id = $request->input('admin_id');
      //  $user_id = $request->input('user_id');
       // $first_name = $request->input('first_name');
       // $last_name = $request->input('last_name');
      //  $email = $request->input('email');
       // $new_password = $request->input('new_password');
        
        DB::transaction(function() use($request){
        $admin_id = $request->input('admin_id');
        $user_id = $request->input('user_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $new_password = Hash::make($request->input('new_password'));
        
           $admin = DB::table('admin')->where('id','=',$admin_id)
           ->update([
               'firstname'=>$first_name,
               'lastname'=>$last_name,
               'email_address'=>$email]);
               
             $user = DB::table('users')->where('id','=',$user_id)
           ->update([
               'username'=>$email,
               'password'=>$new_password,]);
        });
        
        return redirect()->back()->with('message', 'Updated!');
         
    }
}
