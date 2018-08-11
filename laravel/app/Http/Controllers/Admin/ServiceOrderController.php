<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ServiceOrderController extends Controller
{
    //
    
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $serviceorders =  Order::paginate(15);
        return view('admin.serviceorder',compact('serviceorders'));
    }
}
