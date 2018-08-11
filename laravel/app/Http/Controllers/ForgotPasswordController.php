<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use App\UUID;
use \DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showPasswordResetForm(Request $request)
    {
        return view('passwords.email');
    }

    public function sendResetPassword(Request $request)
    {
        // validate password
        $this->validate($request, ['username' => 'required']);
        $user = User::where('username',"=", $request->input('username'))-> first();
        if( count( $user) > 0 )  {
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
            \Mail::to($user->username, $user->name() )
                    ->send(new ForgotPassword($user, $code));
            return back()->with('status', "Reset link has been successfully sent to {$user->username}.");
        } else {
            return back()->withErrors(
                ['username' => "no account with that username"]
            );
        }
    }
    
    public function newpassword(Request $request)
    {
        $token = $request->query('code') ?? "";
        $email = $request->query('email') ?? "";
        $exists = DB::table('password_resets')
                        ->where('token', $token)
                        ->where('email', $email)
                        ->exists();
        if(!$exists)
            return abort(404);

        return view('passwords.reset', compact('token', 'email'));
    }
    
    public function resetpassword(Request $request)
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
        return redirect('login')->with('status', 'Password updated! Please login.');
    }
}