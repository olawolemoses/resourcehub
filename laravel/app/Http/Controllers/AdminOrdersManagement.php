<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;

class AdminOrdersManagement extends Controller
{
    //
  public function __construct(){

  	$this->middleware('auth');

  }

    public function create(){

    	$orders = Order::paginate(15);

    	return view('admin.orders',compact('orders'));
    }

    public function show($id){
     
     $orders = Order::find($id);
     //$orders = $orders->pluck('id');
     return view('admin.view-orders',compact('orders'));
    }

    public function destroy($id){

      \DB::table("orders")->delete($id);
      \Session::put('success','Order deleted successfully');
      return redirect()->route('orders');

    }
}
