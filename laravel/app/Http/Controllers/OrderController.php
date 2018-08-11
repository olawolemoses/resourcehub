<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Document;
use App\Models\Order;
use App\Models\OrderDocument;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request, Service $service)
    {
        $quantity = $request->query('qty') ?? 1;
        //dd( $quantity );

        $order = new Order;
        $order->customer_id = auth()->user()->customer->id;
        $order->service_id = $service->id;
        $order->order_date = date("Y-m-d h:i:s");
        $order->fulfilled = 0;
        $order->paid = 0;
        $order->save();

        $orderID = $order->id;
        
        return view('orders.show', compact('quantity', 'service', 'orderID', 'cartid'));
    }

    public function showDocument(Request $request, Document $document)
    {
        $quantity = $request->query('qty') ?? 1;
        $order = new OrderDocument;
        $order->customer_id = auth()->user()->customer->id;
        $order->document_id = $document->id;
        $order->order_date = date("Y-m-d h:i:s");
        $order->fulfilled = 0;
        $order->paid = 0;
        $order->save();

        $orderID = $order->id;
        
        return view('orders.show_document', compact('quantity', 'document', 'orderID'));
    }
    
    public function addDocumentsToCart(Request $request, Document $document)
    {
        $quantity = 1;
        
        $documentID = "doc_" . $document->id;

        $orderID =  $request->input('orderID');
        
        $itemArray = [ $documentID => [
                        "name" => $document->title, 
                        "itemID" => $documentID, 
                        "orderID" => $orderID,
                        "price" => $document->amount * 100,
                        "quantity"=> $quantity,
                        "type" => "documents",
                        "item_pic" => "/file/documents/uploaded/" . $document->photo
                    ]];
                        
        $data = $request->session()->all();
        
        if ($request->session()->has('cart_item')) 
		{
		    $session = session('cart_item');
            
            if( in_array( "doc_" . $documentID, array_keys( $session ) ) )
            {
                foreach($session as $k=>$v)
                {

                    if($document->id == $k)
                    {
                        if(empty($session[$k]["quantity"])) 
                        {
                            $session[$k]["quantity"] = 0;
                        }
                        
                        $session[$k]["quantity"] +=  $quantity;
                    }
                }
            }
            else 
            {
                $session = $session +  $itemArray;
            }
            
            $request->session()->put('cart_item', $session);
        }
        else 
            $request->session()->put(['cart_item' =>  $itemArray]);
            
        $data = $request->session()->all();
        
        // dd( $data );
                        
        // dd( $document );
        
        return redirect()->route('order.document', ['document' => $document->id]);
    }
    
    public function addtocart(Request $request, Service $service)
    {
        $quantity = $request->input('qty') ?? 1;
        
        $orderID =  $request->input('orderID');
        
        $serviceID = "serv_" . $service->id;
        
        $itemArray = [ $serviceID => [
                        "name" => $service->service_name, 
                        "itemID" => $serviceID, 
                        "orderID" => $orderID,
                        "price" => $service->price  * 100,
                        "quantity"=> $quantity,
                        "type" => "service",
                        "item_pic" => "/img/" . $service->service_photo_image
                    ]];
        
        $data = $request->session()->all();
        
        if ($request->session()->has('cart_item')) 
		{
            $session = session('cart_item');
            
            if( in_array( $serviceID, array_keys( $session ) ) )
            {
                foreach($session as $k=>$v)
                {

                    if($service->id == $k)
                    {
                        if(empty($session[$k]["quantity"])) 
                        {
                            $session[$k]["quantity"] = 0;
                        }
                        
                        $session[$k]["quantity"] +=  $quantity;
                    }
                }
            }
            else 
            {
                $session = $session +  $itemArray;
            }
            
            $request->session()->put('cart_item', $session);
        }
        else 
            $request->session()->put(['cart_item' =>  $itemArray]);
        
        //$data = $request->session()->all();
        
        return redirect()->route('order', ['service' => $service->id]);
    }
    
    public function checkout(Request $request )
    {
        $data = session("cart_item");
        
        list($total_price, $total_quantity) = $this->getTotal( $data );
        
        // send to paystack
        $request->session()->forget('cart_item');
        
        return view('orders.checkout', compact('data', 'total_price', 'total_quantity'));
    }
    
    public function emptycheckout(Request $request)
    {
        $request->session()->forget('cart_item');
        
        return redirect()->route('viewcart');
    }
    
    public function removeFromCart(Request $request, $service)
    {
        if ($request->session()->has('cart_item')) 
		{
            $session = session('cart_item');
            
            if(!empty( $session )) 
            {
                foreach($session as $k=>$v)
                {
                    if($service == $k)
                    {
                        unset( $session[$k] );
                    }
                }
                
                $request->session()->put('cart_item', $session);
                
                if(empty( $session )) 
                {
                    
                    $request->session()->forget('cart_item');
                }
            }
		}
		return redirect()->route('viewcart');
    }

    
    public function viewCart(Request $request)
    {
        // dd( collect(session()->getDrivers())->first()->getId() );
        
        $data = session("cart_item");
        
        
        
        list($total_price, $total_quantity) = $this->getTotal( $data );
        
        //dd( $data );
        
        return view('orders.show_cart', compact('data', 'total_price', 'total_quantity'));
    }
    
    
    public function getTotal( $data )
    {
        $total_price = 0;
        $total_quantity = 0; 
        
        if(!empty($data))
        {
            foreach( $data as $item) 
            {
                $total_price += $item['price'];
                $total_quantity +=  $item['quantity'];
            }
        }
        
        return array($total_price, $total_quantity);
    }
}
