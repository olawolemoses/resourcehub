<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderDocument;
use App\Models\OrderCancelation;
use App\Models\OrderFulfillmentLog;
use App\Models\OrderCancelationsThread;
use DB;
use App\Mail\Welcome; 
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyCustomer;

class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        return view('merchant.index', compact('user', 'merchant', 'profile_pic'));
    }
    
    public function orders(User $user)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        $servicesID =$merchant->services()->pluck("id");
        $orders = Order::where('paid', 1)->whereIn('service_id', $servicesID)->get();
        // dd( $orders );
        return view('merchant.orders', compact('user', 'merchant', 'profile_pic', 'orders'));
    }
    
    public function ordersView(User $user, Order $order)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        
        $orderFulfillments = $order->fulfilments()->get();
        //dd( $orderFulfillments );
        
        
        return view('merchant.order_view', compact('user', 'merchant', 'profile_pic', 'order', 'orderFulfillments'));
    }
    
    public function createOrdersFulfill(User $user, Order $order)
    {
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        // $order->fulfilled = 1;
        // $order->save();
        
        //$order->log("fulfilled");
        
        return view('merchant.order_fulfill', compact('user', 'merchant', 'profile_pic', 'order'));
    }
    
    public function storeOrdersFulfill(User $user, Order $order)
    {
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        //dd( request()->all() );
        
        $orderFulfillment = new OrderFulfillmentLog;
        $orderFulfillment->fulfilment_description = request()->input('description');
        if (request()->hasFile('filename') && request()->file('filename')->isValid()) 
        {
            $file = request()->file('filename');
            $ext = $file->extension();
            $filename = "order_" . uniqid() . "." . $ext;
            $path = $file->move(public_path() . "/orders/", $filename);
            $orderFulfillment->fulfilment_filename = $filename;
        }
        $orderFulfillment->fulfilment_status = request()->input('status');
        $orderFulfillment->merchant_id = $merchant->id;
        $orderFulfillment->order_id = $order->id;
        $orderFulfillment->fulfillment_date = date('Y-m-d h:i:s');
        $orderFulfillment->save();
        

        $order->fulfilled = $orderFulfillment->fulfilment_status;
        $order->update();
        
        //$order->log("fulfilled");
        
        return redirect()->route('merchant_orders_view', compact('user', 'order'));
    }
    
    public function issuesOrderCancel(User $user, Order $order)
    {
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        $orderCancelationsThread = new OrderCancelationsThread;
        $orderCancelationsThread->order_cancelation_id = request()->input('order_cancel_id');
        $orderCancelationsThread->user_id = $user->id;
        $orderCancelationsThread->explanation = request()->input('explanation');
        $orderCancelationsThread->is_merchant = 1;
        $orderCancelationsThread->save();
        
        $order->fulfilled = 4;
        $order->update();

        //$order->log("fulfilled");
        
        return redirect()->route('merchant_orders_view', compact('user', 'order'));
    }
    
    public function services(User $user)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        $services =$merchant->services()->get();
        //$orders = Order::whereIn('service_id', $servicesID)->get();
        //dd( $services );
        return view('merchant.services', compact('user', 'merchant', 'profile_pic', 'services'));
    }
    
    public function servicesView(User $user, Service $service)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        
        $reviews = $service->reviews()->get();
        //dd( $orderFulfillments );
        
        
        return view('merchant.service_view', compact('user', 'merchant', 'profile_pic', 'service', 'reviews'));         
    }
    
    public function createService( Merchant $merchant )
    {
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        return view('merchant.service_new', compact('user', 'merchant', 'profile_pic'));
    }
    
    public function storeService( Merchant $merchant )
    {
        //dd( request()->all() );
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        
        $service = new Service;
        $service->service_name = request()->input('service_name');
        $service->service_description = request()->input('service_description');
        $service->tags = request()->input('tags');
        $service->category_id = request()->input('category_id');
        $service->price = request()->input('price');
        $service->service_photo_image = request()->input('service_photo_image');
        
        if (request()->hasFile('service_photo_image') && request()->file('service_photo_image')->isValid()) 
        {
            $file = request()->file('service_photo_image');
            $ext = $file->extension();
            $filename = "service_" . uniqid() . "." . $ext;
            $path = $file->move(public_path() . "/service/", $filename);
            $service->service_photo_image = $filename;
        }
        $service->merchant_id = $merchant->id;
        $service->save();
        
        return redirect()->route('merchant_services', compact('user'));
    }
    
    public function issues(User $user)
    {
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        $services =$merchant->services()->get();
        //$orders = Order::whereIn('service_id', $servicesID)->get();
        dd( $merchant );
        return view('merchant.services', compact('user', 'merchant', 'profile_pic', 'services'));
    }

    public function show(User $user)
    {
        $user = auth()->user();
        $merchant = $user->merchant;
        $profile_pic = $this->getProfilePic($user);
        return view('merchant.create', compact('user', 'merchant', 'profile_pic'));
    }
    
   
    
    public function create()
    {
        $user = auth()->user();
        $customer = $user->customer;
        $merchant = new Merchant;
        $merchant->firstname = $customer->firstname;
        $merchant->lastname = $customer->lastname;
        $merchant->bvn_mobile_no = $customer->mobile_no;
        $merchant->email_address = $customer->email_address;
        $merchant->street = "";
        $merchant->city = "";
        $merchant->state = "";
        $merchant->country = "";
        $merchant->status = "";
        $merchant->store_name = "";
        $merchant->store_name_url = "";
        $merchant->store_about_us = "";
        $merchant->store_portfolio = "";
        
        $profile_pic = $this->getProfilePic($user);
        
        return view('merchant.create', compact('merchant', 'profile_pic', 'user') );
    }    

    public function store(Request $request)
    {
        // validate the form
        $this->validate(request(), [
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'bvn_mobile_no' => 'required',
            'store_name' => 'required',
            'store_name_url' => 'required',
            'store_about_us' => 'required', 
            'store_portfolio' => 'required',
            'email_address' => 'required|string|email|max:255|exists:users,username'
        ]);

        $user_type = 1;
        DB::beginTransaction();
        $user = auth()->user();

        try 
        {
            $merchant = Merchant::create( ['user_id' => $user->id, 'status'=>0 ] + request()->all() );
        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect::to('/login')->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        $email = $merchant->email_address;
        $name = $merchant->firstname .' ' . $merchant->lastname;
        return redirect('/merchant/thankyou/' . $user->id);
    }

    public function thankyou(User $user)
    {
        $merchant = $user->merchant;
        
        $email = $merchant->email_address;
        
        $name = $merchant->firstname . ' ' . $merchant->lastname;
        
        // $url = url("/verify/{$user->id}");
        
        //\Mail::to($email, $name)->send(new VerifyCustomer($url));        
        
        //return $user;
        return view('merchant.thankyou', compact('user', 'merchant', 'name'));
    }

    public function verify(User $user, Request $request){
        $customer = $user->customer;
        // if verified 
        if($customer->status == 1){
            // return already verified view
            return view('customer.already_verified');
        }
        // if not verified
        elseif ($customer->status == 0) {
            //carry out verification
            $customer->status = 1;
            $customer->save();
            $name = $customer->firstname . ' ' . $customer->lastname;
            $email = $customer->email_address;
            $url = url("/verify/{$user->id}");
            \Mail::to($email, $name)->send( new Welcome($user) );
            $request->session()->flash('message', 'Your account has been successfully verified!');        
            return redirect()->route('index');
        }
        else {
            return view('customer.error_verified');
        }
    }



    public function showOrders(User $user)
    {
        $profile_pic = $this->getProfilePic($user);
        $orders = $user->order()->where('paid', 1)->get();
        $orderDocuments = $user->orderDocument()->where('fulfilled', 1)->where('paid', 1)->get();
        return view('customer.show_orders', compact('profile_pic', 'user', 'orders', 'orderDocuments'));
    }

    public function showOrder(User $user, Order $order)
    {
        $profile_pic = $this->getProfilePic($user);
        $orders = $user->order()->where('fulfilled',1)->where('paid', 1)->get();
        $orderDocuments = $user->orderDocument()->where('fulfilled', 1)->where('paid', 1)->get();
        return view('customer.show_orders', compact('profile_pic','user', 'orders', 'order', 'orderDocuments'));
    }

    public function update(Merchant $merchant, Request $request)
    {
        //dd($request->all());
        // validate the form
        //dd($user->customer);
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'bvn_mobile_no' => 'required',
            'store_name' => 'required',
            'store_name_url' => 'required',
            'store_about_us' => 'required', 
            'store_portfolio' => 'required',
            'email_address' => 'required|string|email|max:255|exists:users,username|unique:merchants,email_address,'.$merchant->id,
        ]);

        //dd($request);

        $user_type = 1;
        DB::beginTransaction();
        
        try {
            // Validate, then create if valid
            $input = $request->all();
            $merchant->fill($input)->save();
            $merchant->save();
            $request->session()->flash('message', 'Update was successful!');
        } catch (ValidationException $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            return Redirect::to('/login')->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        // If we reach here, then data is valid and working.
        // Commit the queries!
        DB::commit();
        $email = $merchant->email_address;
        $name = $merchant->firstname . ' ' . $merchant->lastname;
        //auth()->login($user);
   
        return redirect()->route('merchant_update', ['merchant' => $merchant]);
    }

    public function deleteAccount(User $user)
    {
        // $user->delete();
        $user->status = 0;
        $user->update();

        $customer = $user->customer();
        $customer->status = 0;
        $customer->update();
    }
    
    public function updatePicture(User $user, Request $request)
    {
        $customer = $user->customer;
        
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) 
        {
            $file = $request->file('picture');
            $ext = $file->extension();
            $filename = "picture_" . uniqid() . "." . $ext;
            $path = $file->move(public_path() . "/picture/", $filename);
            $customer->profile_picture = $filename;
            $customer->save();
            return redirect()->route('customer.show', ['user' => $user]);
        }
    }

    public function showPicture(User $user)
    {
        $profile_pic = $this->getProfilePic( $user );
        return view('customer.show_picture', compact('user', 'profile_pic'));
    }

    public function getProfilePic( $user )
    {
        $profile_pic = $user->customer->profile_picture;
        if (is_null($profile_pic) || empty($profile_pic))
            $profile_pic = "picture_mysteryman.png";
        return $profile_pic;
    }

    public function showCancelOrder(User $user, Order $order)
    {
        $profile_pic = $user->customer->profile_picture;
        if (is_null($profile_pic) || empty($profile_pic))
            $profile_pic = "picture_mysteryman.png";
        //return $profile_pic;
        return view('customer.show_cancelOrder', compact('user', 'order', 'profile_pic'));
    }

    public function cancelOrder(User $user, Order $order, Request $request)
    {
        $cancelOrder = new OrderCancelation;
        $cancelOrder->order_id = $order->id;
        $cancelOrder->user_id = $user->customer->id;
        $cancelOrder->explanation = request()->input('explanation');
        $cancelOrder->refund = 0;
        $cancelOrder->accept = 0;
        $cancelOrder->created_at = date('Y-m-d H:i:s');
        $cancelOrder->updated_at = date('Y-m-d H:i:s');
        $cancelOrder->save();
        $request->session()->flash('message', 'Your request has been sent to the merchant and you would notified of a response.');
        return redirect()->route('customer.show.order', ['user' => $user, 'order' => $order]);
    }

    public function deactivate(Request $request, User $user)
    {
        // dd( [ $user, $request->all()] );
        // Delete Account
        // => perform soft delete
        // use the soft delete of the laravel framework
        // check the user account
        $user->delete();

        // check the customer table for status,
        $customer = $user->customer();
        $customer->delete();

        // check merchant table for status
        $merchant = $user->merchant();
        if( $merchant->count() > 0 )
            $merchant->delete();
        return redirect()->route('customer.deactivated', ['user'=>$user]);
    }
    public function deactivated(Request $request, $user)
    {
        $user = User::withTrashed()
            ->find($user);
            
        $name = $user->customer()->withTrashed()->first()->name();
        
        auth()->logout();
        
        return view('customer.deactivated', compact('user', 'name'));
    }

    public function reactivate(Request $request, $user)
    {
        User::withTrashed()
            ->find($user)->restore();
        $user = User::find($user);
    
        // check the customer table for status,
        $customer = $user->customer()->withTrashed();
        $customer->restore();

        // check merchant table for status
        $merchant = $user->merchant();
        if ($merchant->count() > 0)
            $merchant->restore();
            
        auth()->logout();

        return redirect()->route('index');
    }
    
}
