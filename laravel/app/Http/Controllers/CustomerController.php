<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDocument;
use App\Models\OrderCancelation;
use DB;
use App\Mail\Welcome; 
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyCustomer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['show', 'showOrder']);
    }

    public function create()
    {
        return view('customer.create');
    }    

    public function store(Request $request)
    {
        // validate the form
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            // 'street' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'country' => 'required',
            // 'mobileno' => 'required',
            'username' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user_type = 1;
        DB::beginTransaction();
        $user = "";

        try {
            // Validate, then create if valid
            $user = User::create([
                'user_type' => $user_type,
                'username' => request('username'),
                'password' => Hash::make(request('password'))
            ]);
        } catch (ValidationException $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            return Redirect::to('/form')->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try 
        {
            // Validate, then create if valid
            $customer = Customer::create([
                'firstname' =>request('firstname'),
                'lastname' =>request('lastname'),
                'street' => request('street'),
                'city' => request('city'),
                'state' => request('state'),
                'country' => request('country'),
                'mobile_no' => request('mobileno'),
                'email_address' => request('username'),
                'user_id' => $user->id,
                'status' => 0,
            ]);
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
        $email = $customer->email_address;
        $name = $customer->firstname .' ' . $customer->lastname;
        //auth()->login($user);
        //-> content of email
       
       $request->session()->flash('status', 'Your account has been registered!');     
        return redirect('/thankyou/' . $user->id);
        //return redirect('/home');
    }

    public function thankyou(User $user){
        $customer = $user->customer;
        $email = $customer->email_address;
        $name = $customer->firstname . ' ' . $customer->lastname;
        echo $email;
        echo $name;
        
        $url = url("/verify/{$user->id}");
        \Mail::to($email, $name)->send(new VerifyCustomer($url));        
        //return $user;
        return view('customer.thankyou');
    }

    public function verify(User $user, Request $request){
        
        $customer = $user->customer;

        // if verified 
        if( $user->isActivated() )
        {
            return view('customer.already_verified');
        }
        
        elseif (! $user->isActivated() ) 
        {   
            $customer->status = 1;
            $customer->save();
            
            $user->status = 1;
            $user->save();
            
            $name = $customer->firstname . ' ' . $customer->lastname;
            $email = $customer->email_address;
            $url = url("/verify/{$user->id}");
            
            \Mail::to($email, $name)->send( new Welcome($user) );
            
            $request->session()->flash('status', 'Your account has been successfully verified!');
            
            auth()->login($user);
            return redirect()->route('index');
        }
    }

    public function show(User $user)
    {
        $orders = $user->order()->where('paid', 1)->get();
        $orderDocuments = $user->orderDocument()->where('paid',1)->get();
        $profile_pic = $this->getProfilePic($user);
        return view('customer.show', compact('user', 'orders', 'orderDocuments', 'profile_pic'));
    }

    public function showOrders(User $user)
    {
        $profile_pic = $this->getProfilePic($user);
        $orders = $user->customer->order()->where('paid', 1)->get();
        $orderDocuments = $user->customer->orderDocument()->where('paid', 1)->get();
        //$orderFulfillments = $order->fulfilments()->get();
        return view('customer.show_orders', compact('profile_pic', 'user', 'orders', 'orderDocuments', 'orderFulfillments'));
    }

    public function showOrder(User $user, Order $order)
    {
        $profile_pic = $this->getProfilePic($user);
        $orders = $user->customer->order()->where('paid', 1)->get();
        $orderDocuments = $user->customer->orderDocument()->where('paid', 1)->get();
        $orderFulfillments = $order->fulfilments()->get();
        $orderID = $order->id;
        return view('customer.show_orders', compact('profile_pic','user', 'orders', 'order', 'orderDocuments', 'orderFulfillments', 'orderID'));
    }

    public function update(User $user, Request $request)
    {
        //dd($request->all());
        // validate the form
        //dd($user->customer);
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            // 'street' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'country' => 'required',
            // 'mobileno' => 'required',
            'username' => 'required|string|email|max:255|unique:users,username,'.$user->id,
            'password' => 'required|confirmed',
        ]);

        //dd($request);

        $user_type = 1;
        DB::beginTransaction();

        $customer = $user->customer;
        try {
            // Validate, then create if valid
            $customer->firstname = request('firstname');
            $customer->lastname =request('lastname');
            $customer->street = request('street');
            $customer->city = request('city');
            $customer->state = request('state');
            $customer->country = request('country');
            $customer->mobile_no = request('mobile_no');
            $customer->email_address = request('username');
            
            if (request('password') != '***********************************'){
                $user = $customer->user;                
                $user->password = request('password');
                $user->save();
            }
            
            $customer->save();
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
        $email = $customer->email_address;
        $name = $customer->firstname . ' ' . $customer->lastname;
        //auth()->login($user);
        //-> content of email

        //return redirect('/thankyou/' . $user->id);
        return redirect()->route('customer.show', ['user' => $user]);
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
        
        $this->validate(request(), [
            'picture' => 'mimes:jpg,jpeg,png'
        ]);
        
        
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
        // and disable from all sides 
        // of login and session usage
        //google
        // facebook
        // linkedin
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
