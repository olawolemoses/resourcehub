<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant;
use App\Models\Ad;

class SiteController extends Controller
{
    public function index()
    {
        //$user_id = 1; // Jacobi Group
        
        $merchant = Merchant::find(1);
        $home = Ad::homeAds();
        $documents = $merchant->documents()->limit(8)->get();
        
        return view('site.site', ['documents' => $documents,'home' => $home,]);
        
    }
}
