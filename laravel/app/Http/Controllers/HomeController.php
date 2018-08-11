<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use App\Models\Order;
use App\Models\OrderDocument;
use DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        $profile = $user->profile;
        
        if(is_null( $profile ))
            $profile = new Profile;
            
        $orders = $user->orders;
        
        return view('site.dashboard', compact('user', 'profile', 'orders'));
    }
    
    public function update(Request $request)
    {
        $user = auth()->user();
     
        $user = User::find($user->id);

        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'mobile_no' => 'required',
        ]);


        $user_type = 1;
        DB::beginTransaction();

        $customer = $user->profile;
        try {
            // Validate, then create if valid
            $user->firstname = request('firstname');
            $user->lastname =request('lastname');
            $customer->street = request('street');
            $customer->city = request('city');
            $customer->state = request('state');
            $customer->country = request('country');
            $customer->mobile_no = request('mobile_no');

            $customer->save();
            
            $user->save();
            
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
        
        //return redirect('/thankyou/' . $user->id);
        return redirect()->route('dashboard');
    }

    public function passwordUpdate(Request $request)
    {
        //dd($request->all());
        
        $user = auth()->user();
        $user = User::find($user->id);
        $this->validate(request(), [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user_type = 1;
        DB::beginTransaction();

        try {
            // Validate, then create if valid
            if (request('old_password') != '***********************************'){
                $user->password =  Hash::make(request('new_password'));
                $user->save();
            }
            
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
        
        //return redirect('/thankyou/' . $user->id);
        return redirect()->route('dashboard');
    }

}
