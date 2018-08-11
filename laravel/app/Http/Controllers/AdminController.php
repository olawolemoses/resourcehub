<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\order;
use DB;

class AdminController extends Controller
{
    //
public function __construct(){

$this->middleware('guest');

}
    public function create(){

    	return view('admin.index');
    }

   public function store(){

   		$this->validate(request(),[
         
         'username' => 'required|email',
         'password' => 'required',

   		]);

       if( $login = auth()->attempt(request(['username','password']))){
           
           $users = DB::table('users')->orderBy('created_at','asc')
           ->limit(10)
           ->get();
           $orders = DB::table('orders')->orderBy('created_at','desc')
           ->limit(10)
           ->get();
        	  return view('admin.admin-dashboard',compact('users','orders'));

        }else{

        	return back()->withErrors([
             
             "message" => "Please Check your credentials"
              
        	]);
        }

     ;
   }
  
   
   
       
 
 
}
