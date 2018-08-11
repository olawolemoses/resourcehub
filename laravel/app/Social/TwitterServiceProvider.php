<?php
namespace App\Social;
use App\Models\User;
use DB;

class TwitterServiceProvider extends AbstractServiceProvider
{
    /**
     *  Handle Facebook response
     * 
     *  @return Illuminate\Http\Response
     */
    
    public function handle()
    {
        $user = $this->provider->fields([
            'id',
            'first-name',
            'last-name',
            'email-address'
        ])->user();
        
        $this->setUser( $user );
        
        $existingUser = User::where("twitter_id", "=", $user->id)->first();
        
        if ($existingUser) 
        {
            return $this->performLogin( $existingUser );
        }

        //  if a user exists with the mail associate account with the social id
        $existingSocialEmailUser = User::withTrashed()
            ->where("username", "=", $user->email)->first();
            
        if ($existingSocialEmailUser) 
        {
            return $this->performLogin( $existingSocialEmailUser );
        }
        else 
        {
            //  create a new login account from social account
            return $this->performRegister( $user );
        }
    }
    
    public function performRegister( $user )
    {
        dd( $user );
        
        $newUser = $this->register([
            'firstname' => $user->user['firstName'],
            'lastname' => $user->user['lastName'],
            'email' => $user->email,
            'last_login' => time(),
            'remember_token'=>'xyz',
            //'gender' => ucfirst($user->user['gender']),
            'settings' => json_encode( ['twitter_id' => $user->id] ),
            'username' => $user->email, 
            'user_type' => 1,
        ]);
        
        if ($newUser instanceof User) 
            return $this->thankyou( $newUser );
        
        return $newUser;
    }
    
    public function performLogin( $existingSocialEmailUser )
    {
        if( $existingSocialEmailUser->trashed() )
        {
            return $this->reactivate( $existingSocialEmailUser );
        }
        else
        {
            return $this->storeLoginData( $existingSocialEmailUser );
        }
    }
    
    protected function storeLoginData( $existingSocialEmailUser )
    {
        $user = $this->getUser();
        
        $settings = $existingSocialEmailUser->settings;
            if (!isset($settings['linkedin_id'])) {
                $settings = json_decode($settings, TRUE);
                $settings['twitter_id'] = $user->id;
                $existingSocialEmailUser->settings = json_encode($settings);
                 $existingSocialEmailUser->linkedin_id = $user->id;
                $existingSocialEmailUser->save();
            }
        
        return $this->login($existingSocialEmailUser);
    }
}