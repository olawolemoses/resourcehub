<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use App\Mail\AdminForgotPassword;
use Illuminate\Support\Facades\Hash;
use App\UUID;
use \DB;

class AdminForgotPasswordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function showResetPassword(){
        return view('admin.forgot');
    }
    
    public function sendResetEmail(Request $request){
          // validate password
        $this->validate($request, ['username' => 'required']);
        
        $user = User::where('username',"=", $request->input('username'))
        ->where('user_type','=',0)
        -> first();
        
          if( $user->count() > 0 )  {
            // send mail of reset: Not done
            $token = new UUID;
            $code = str_random(40);
            DB::table('password_resets')
                ->where('email', $request->input('username'))
                ->delete();

            DB::table('password_resets')->insert(
                [
                    'email' => $request->input('username'), 
                    'token' => $code,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
            \Mail::to($user->admin->email_address, $user->admin->name() )
                    ->send(new AdminForgotPassword($user, $code));
            return back()->with('status', "Reset link has been successfully sent to {$user->Admin->email_address}.");
        } else {
            return back()->withErrors(
                ['username' => "wrong username"]
            );
        }
        
    }
    
    
    public function ResetPassword(Request $request)
    {
        $token = $request->query('code') ?? "";
        $email = $request->query('email') ?? "";
        $exists = DB::table('password_resets')
                        ->where('token', $token)
                        ->where('email', $email)
                        ->exists();
        if(!$exists)
            return abort(404);

        return view('passwords.adminreset', compact('token', 'email'));
    }
    
    public function changepassword(Request $request)
    {
        $this->validate(request(), [
            'token' => 'required',
            'username' => 'required|string|email|max:255|exists:users,username',
            'password' => 'required|confirmed',
        ]);
        //return $request;
        $token = $request->input('code');
        $user = User::where('username','=', $request->input('username') )->first();
        $user->password = Hash::make($request->input('password'));

        DB::table('password_resets')
                ->where('email', $request->input('username'))
                ->delete();

        $user->save();
        return redirect('admin')->with('status', 'Password updated! Please login.');
    }
    
    
    
    
    
    
}
