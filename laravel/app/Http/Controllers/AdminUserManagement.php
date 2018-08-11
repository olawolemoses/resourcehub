<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Service;
use App\Models\Review;

class AdminUserManagement extends Controller
{
    //
    public function __construct(){

    	$this->middleware('auth');
    }

    public function create(){
        
        $allUsers = User::paginate(15);

      return view('admin.users',compact('allUsers'));

    }

    public function destroy(Request $request){
      
      $user = User::findorFail($request->user_id);
      $usertype = $user->user_type;
      if($usertype == 1){
        $customer = Customer::where('user_id','=',$user->id);
        $customer->delete();     
        $user->delete(); 
      }else if($usertype == 2){
          $admin = Merchant::where('user_id','=',$user->id);
          $admin->delete();
          $user->delete();
      }
      
     return back()->with('success','User Successfully Deleted');
    }

    /**public function delete_user($id){

    	//select the user by id
    	$user = User::find($id);

        if($user->user_type ==  0){
 
          return  "Admin can not be deleted";

        }else{

          //delete the user if he is customer|merchant
          $user = $user->delete();

        if($user){

            return redirect('users')->with('status','User Deleted successfully');
        }
            
        }
}**/

       public function view_user($id)
       {
       	# code...
        $user = User::find($id);
        $user_id = $user->pluck('id');
        if($user->user_type == 1){
        $customer_user = Customer::where('user_id','=',$user->id)->first();
        
         return view('admin.customer_user',compact('customer_user','user_id'));
        }else if($user->user_type == 2){
         
         $merchant_user = Merchant::where('user_id','=',$user->id)->first();
         $services_offered = Service::where('merchant_id','=',$merchant_user->id);
        
         return view('admin.merchant_user',compact('merchant_user','services_offered','user_id'));
        } 

       }

       public function deactivate($user_id){
 
          $user = User::find($user_id);

          if($user->user_type == 1){
         
           $customer = Customer::where('user_id','=',$user->id)->first();
           $customer->status = 0;
           $customer->save();
           return $customer;

          }else if($user->user_type){
      
          $merchant = Merchant::where('user_id','=',$user->id)->first();
          $merchant->status = 1;
           $merchant->save();
           return $merchant;
          }


       } 
       public function filter($usertype){
           $user = User::where('usertype','=',$usertype)->get();
        return dd($user);
           
       }


   /** public function search()
    {
  
  //   $user_type = Request::get('user_type');
     $user_type = 'customer';
     $result = DB::table('users')->where('user_type','=',$user_type)->get();

     return $result;

    }**/


    
}
