<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use \DB;
use App\ServiceFilters;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;


class ProfileController extends Controller
{
    public function index(User $user, Service $service)
    {
        $reviews = [];
        
        if( count( $service->reviews() ))
            $reviews = $service->reviews()->get();
        
        $availability = [];
        
        if( count( $user->merchant->availability() ) )
            $availability = $user->merchant->availability()->get();
        
        //dd( $service->hasPaid( auth()->user()->id ));
        
        return view('profile.index', [ 'reviews'=>$reviews, 'user' => $user, 'service'=>$service, 'availability'=>$availability ]);    
    }
       
}