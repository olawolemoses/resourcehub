<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Service;
use App\Models\Document;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    public function index(Request $request, Service $service)
    {
        
        $quantity = $request->query('qty') ?? 1;

        // $order = new Order;
        // $order->customer_id = auth()->user()->customer->id;
        // $order->service_id = $service->id;
        // $order->order_date = date("Y-m-d h:i:s");
        // $order->fulfilled = 0;
        // $order->paid = 0;
        // $order->save();

        // $orderID = $order->id;
        
        // return view('orders.show', compact('quantity', 'service', 'orderID', 'cartid'));
        return view('checkout.index', compact('service', 'quantity'));
    }
    
    public function documentCheckout(Request $request, Document $document)
    {
        
        $quantity = $request->query('qty') ?? 1;

        // $order = new Order;
        // $order->customer_id = auth()->user()->customer->id;
        // $order->service_id = $service->id;
        // $order->order_date = date("Y-m-d h:i:s");
        // $order->fulfilled = 0;
        // $order->paid = 0;
        // $order->save();

        // $orderID = $order->id;
        
        // return view('orders.show', compact('quantity', 'service', 'orderID', 'cartid'));
        return view('checkout.document', compact('document', 'quantity'));
    }
    
}