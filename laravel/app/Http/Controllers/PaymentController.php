<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use Carbon\Carbon;

use App\Models\Service;
use App\Models\Document;
use App\Models\Order;
use App\Models\OrderDocument;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        
        // dd( $paymentDetails );
        $status =  $paymentDetails["data"]['status'];
        
        if( $status == 'success' )
        {
            $payment = Payment::where( 'reference_no',  $paymentDetails["data"]['reference'])->first();
            if( is_null( $payment ))
                $payment = new Payment;
            $payment->user_id = auth()->user()->id;
            $payment->reference_no = $paymentDetails["data"]['reference'];
            $payment->order_transaction = json_encode( $paymentDetails );
            $payment->transaction_status = 1;
            $date = new \DateTime($paymentDetails["data"]['paid_at']);
            $payment->payment_date =  $date->format('Y-m-d H:i:s');
            $payment->save();
            
            $status =  $paymentDetails["data"]['status'];
            //$customer = $paymentDetails["data"]['customer'];
            
            // order ref reference // amount // authorization_code

            $customerName = auth()->user()->name();
            $customerEmail = auth()->user()->username;

            $amount = number_format( ($paymentDetails["data"] ['amount'] / 100), 2, ".", ",");
            
            //$quantity = $paymentDetails["data"]['metadata']['quantity'];
            
            $quantity = 0;
            $paidAt = $paymentDetails["data"]['paidAt'];
            $datePaidAtString = Carbon::createFromFormat('Y-m-d\TH:i:s.uP', $paidAt)->toDateTimeString();
            $datePaidAt = Carbon::createFromFormat('Y-m-d\TH:i:s.uP', $paidAt)->format('Y-m-d');
            
            $reference = $paymentDetails["data"]['reference'];
            
            // $orderID = $paymentDetails["data"]['metadata']['orderID'];

            //dd( $paymentDetails["data"]['metadata']); //['orders'] );
             $user = '';
             
             $order = '';
             
            if (isset($paymentDetails["data"]['metadata']['orders']))
            {
                $paidOrders = $paymentDetails["data"]['metadata']['orders'];
                
                foreach( $paidOrders as $paidOrder)
                {
                    $itemID = $paidOrder['itemID'];
                    list($type, $itemID) = explode("_", $itemID);
                    
                    if ($type == "serv")
                    {
                        $service = Service::find( $itemID );
                        $user = $service->user;
                        $order = Order::where( 'reference_no',  $paymentDetails["data"]['reference'])->first();
                        if( is_null( $order ))                        
                            $order = new Order;
                        $order->user_id = auth()->user()->id;
                        $order->reference_no = $paidOrder['orderID'];
                        $order->service_id = $service->id;
                        $order->fulfilled = 0;
                        $order->paid = 1;
                        $order->amount = $paidOrder['price'];
                        $order->reference_no = $reference;
                        $order->quantity = $paidOrder['quantity'];
                        $order->tracking_status = 0;
                        $quantity += $paidOrder['quantity'];
                        $order->save();
                    }
                    elseif( $type == "doc")
                    {
                        $service = Document::find($itemID);
                                                $user = $service->user;
                        $order = OrderDocument::where( 'reference_no',  $paymentDetails["data"]['reference'])->first();
                        
                        if( is_null( $order ))                        
                            $order = new OrderDocument;
                        $order->user_id = auth()->user()->id;
                        $order->document_id = $service->id;
                        $order->quantity = $paidOrder['quantity'];
                        $order->fulfilled = 0;
                        $order->paid = 1;
                        $order->reference_no = $reference;
                        $order->tracking_status = 0;
                        $order->document_data = json_encode( session('document') );
                        $order->amount = $paidOrder['price'];
                        
                        $quantity += $paidOrder['quantity'];
                        $order->save();
                        
                    }
                }
                
                if ($type == "serv")
                    return view('payment.success', compact('customerName', 'customerEmail', 'amount', 'type', 'service', 'user', 'datePaidAt', 'paidOrders', 'quantity', 'reference'));
                else
                    return view('payment.success_document', compact('customerName', 'order', 'customerEmail', 'amount', 'type', 'service', 'user', 'datePaidAt', 'paidOrders', 'quantity', 'reference'));
            }
        }
        else
            echo "fail";

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
