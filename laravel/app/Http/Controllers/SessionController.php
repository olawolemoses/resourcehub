<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    
    public function create()
    {
        
        return view('session.login');
        
    }

    public function store()
    {
        // // validate the form
        $this->validate( request(), [
          'username' => 'required',
          'password' => 'required',
        ]);

        $username = request('username');
        $password = request('password');
        $remember = request('remember_me') == '1' ? true : false;
        

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember))
        {
            // Authentication passed...
                $existingUser = User::withTrashed()->where("username", "=", $username)->first();
                    
                if($existingUser->trashed() )
                {
                    return redirect()->route('customer.deactivated', ['user' => $existingUser]);
                }
            
                if(! $existingUser->isActivated() )
                    return redirect()->route('login')->withErrors(array('message' => 'Your account has not been activated.'));
                    
                // if the user is a merchant
                // if(! is_null( $existingUser->merchant ) )
                //     return redirect()->route('merchant_index', ['user' => $existingUser->id]);
                return redirect()->intended('/'); // redirect()->route('index');
                
        }   
        else 
        {
            return back()->withErrors([
            
                'message' => 'Please check your credentials and try again.'
            
            ]);
        }
        return redirect()->route('index');
    }

    public function destroy()
    {
        auth()->logout();
        //return redirect()->home();
        return redirect()->route('index');
    }
   
}