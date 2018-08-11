<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function index()
    {
      $users = User::all();
      $vendors = User::where('user_type','=',2)->get();
      $orders = Order::all();
      $new_orders = Order::where('created_at','=',NOW())->get();
      
      return view('admin.admin-dashboard',compact('users','vendors','orders'));
    }
}
