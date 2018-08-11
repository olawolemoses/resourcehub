<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Analytics;
use Spatie\Analytics\Period;

class AdminDashboardController extends Controller
{
    //
  public function __construct(){

  	$this->middleware('auth');

  }

    public function create(){

      $orders = Order::limit(8)->get();
      $users = User::limit(5)->get();
    	
      return view('admin.admin-dashboard',compact('orders','users'));
    }

   public function chart(){
     
   $price = Service::pluck('price');
    $price =  $price->toJson();
    return $price;
   }
    public function destroy(){

    	auth()->logout();

    	return redirect('/admin');
    }

   static public function visitors(){

     $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
     $analyticsData = $analyticsData->pluck('visitors');
    //$analytics = $analyticsData->toArray();
    return dd($analyticsData);
  
   /** foreach ($analytics as $data) {
      # code...
      return $data['visitors'];
    }**/
    //dd($analytics);


   }
 

}
