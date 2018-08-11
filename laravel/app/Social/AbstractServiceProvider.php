<?php
namespace App\Social;
use App\Models\User;
use App\Models\Profile;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyCustomer;


abstract class AbstractServiceProvider
{
    protected $provider;
    
    protected $user;

    /**
     *  Create a new SocialServiceProvider instance
     */
    public function __construct()
    {
        $this->provider = Socialite::driver(
            str_replace(
                'serviceprovider',
                '',
                strtolower((new \ReflectionClass($this))->getShortName())
            )
        );
        
        $this->user = null;
    }
    
    public function setUser( $user )
    {
        $this->user = $user;
    }
    
    public function getUser( )
    {
       return  $this->user;
    }

    /**
     *  Logged in the user
     * 
     *  @param  \App\User $user
     *  @return \Illuminate\Http\Response
     */
    protected function login($user)
    {
        auth()->login($user);
        
        if(! is_null( $user->merchant ) )
            return redirect()->route('merchant_index', ['user' => $user->id]);
            
        //dd( $user );
        
        return redirect()->route('index');
    }
    
    protected function thankyou( $user )
    {
        $email = $user->username;
        
        $name = $user->firstname .' ' . $user->lastname;
        
        $url = url("/verify/{$user->id}");
        
        \Mail::to($email, $name)->send(new VerifyCustomer($url)); 
        
        request()->session()->flash('status', 'You have been successfully been registered. Kindly confirm your email in the mail we have sent you.');
        
        auth()->login($user);
        
        return redirect()->route('index');
        
        //return redirect()->route('login');
        
        //request()->session()->flash('status', 'Your account has been registered!');
        
        //return redirect('/thankyou/' . $user->id);
    }
    
    protected function reactivate($user)
    {
        return redirect()->route('customer.deactivated', ['user' => $user]);
    }
    
    /**
     *  Register the user
     * 
     *  @param  array $user
     *  @return User $user
     */
    protected function register(array $user)
    {
        $password = bcrypt(str_random(10));
        //$newUser = User::create(array_merge($user, [ 'password' => $password]));
        $user_type = 1;
        
        $newUser = [];
        
        \DB::beginTransaction();
        
        try {
            // Validate, then create if valid
            $newUser = User::create([
                'user_type' => $user_type,
                'username' => $user['email'],
                'password' => Hash::make($password),
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
            ]);
            
            $profile = Profile::create([
                'user_id' => $newUser->id,
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
            \DB::rollback();
            return redirect()->route('login')->withErrors($e->getMessage())->withInput();
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->route('login')->withErrors($e->getMessage())->withInput();
        }
        
        \DB::commit();
        
        return $newUser;
    }

    /**
     *  Redirect the user to provider authentication page
     * 
     *  @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return $this->provider->redirect();
    }

    /**
     *  Handle data returned by the provider
     * 
     *  @return \Illuminate\Http\Response
     */
    abstract public function handle();
}