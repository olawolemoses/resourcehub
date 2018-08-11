<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use carbon\carbon;

class AdController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index(){
        
        $ads = Ad::all();
        return view('admin.ads',compact('ads'));
    }
    
    public function create()
    {
        return view('admin.addad');
    }
    
    public function store(Request $request)
    {
        
        
        $request->validate([
         'ad_location_id' => 'required',
         'ad_title' => 'required',
         'ad_description'=> 'required',
         'ad_image' => 'required',
         'ad_targeturl' => 'required',
         'ad_status' => 'required',
         'ad_startdate' => 'required',
         'ad_enddate' => 'required',
        ]);
        
       $banner = $request->file('ad_image');
       $banner_file_name  = rand().'.'.$banner->getClientOriginalExtension();
       $banner->move(public_path('img'), $banner_file_name); 
        
        $ad = Ad::create([
           'location_id' => request('ad_location_id'),
           'title' => request('ad_title'),
           'description' => request('ad_description'),
           'banner_file_name' => $banner_file_name,
           'target_url' => request('ad_targeturl'),
           'show_status' => request('ad_status'),
           'start_date' => request('ad_startdate'),  
           'end_date' => request('ad_enddate')
        ]);
        
      return back()->with('success','Ad created successfully');
        //return dd($request->all());
    }
    
    public function edit($id)
    {
        $ad = Ad::find($id);
        //$strdate = Carbon::createFromFormat($format, $time, $tz);
        return view('admin.editadd',compact('ad'));
    }
    
    public function destroy(Request $request)
    {
        $ad = Ad::where('id','=',request('ad_id'))->first();
        $ad->delete();
        return back()->with('success','Ad deleted successfully');
        //return dd($request->all());
    }
    
    public function time()
    {
        $time = NOW();
        return view('admin.test',compact('time'));
    }
}
