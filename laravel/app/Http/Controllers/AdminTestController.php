<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class AdminTestController extends Controller
{
    //
    
    public function test(){
        $price = Service::pluck('price');
        $price =  $price->toJson();
         return view('admin.admin-test',compact('price'));
    }
    
    
    
}
