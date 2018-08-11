<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use DB;
use App\Mail\Welcome; 
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyCustomer;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
        
        return view('register.index');
        
    }
    
    public function store()
    {
        $this->validate( request(), [
            'firstname' => 'required',
            'lastname' => 'required',
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
                'password' => Hash::make(request('password')),
                'firstname' => request('firstname'),
                'lastname' => request('lastname'),
            ]);
            
            $profile = Profile::create([
                'user_id' => $user->id,
                'title' => '.',
                'street' => '.',
                'city' => '.',
                'state' => '.',
                'country' => '.',
                'mobile_no' => '.',
                'profile_picture' => 'mysteryman.jpg',
                'status' => 0,
            ]);
            
        } catch (ValidationException $e) {
            // Rollback and then redirect back to form with errors
            DB::rollback();
            return back()->withErrors($e->getMessage())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage())->withInput();
        }
        
        DB::commit();
        
        $email = $user->username;
        
        $name = $user->firstname .' ' . $user->lastname;
        
        $url = url("/verify/{$user->id}");
        
        \Mail::to($email, $name)->send(new VerifyCustomer($url)); 
        
        request()->session()->flash('status', 'You have been successfully been registered. Kindly confirm your email in the mail we have sent you.');
        
        return redirect()->route('login');
    }
    
    public function verify(User $user, Request $request)
    {

        if( $user->isActivated() )
        {
            return view('register.already_verified');
        }
        
        elseif (! $user->isActivated() ) 
        {   
            $user->status = 1;
            
            $user->save();
            
            $name = $user->firstname . ' ' . $user->lastname;
            
            $email = $user->username;
            
            $url = url("/verify/{$user->id}");
            
            \Mail::to($email, $name)->send( new Welcome($user) );
            
            $request->session()->flash('status', 'Your account has been successfully activated!');
            
            //auth()->login($user);
            
            return redirect()->route('login');
        }
    }
    
    
    
}