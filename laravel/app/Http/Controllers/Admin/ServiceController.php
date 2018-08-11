<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
      $services = Service::paginate(15);
       return view('admin.services',compact('services'));
    }
    
    public function create(){
        
        $categories = Category::all();
        return view('admin.addservice',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
        'user_id' => 'required',    
        'service_name' => 'required',
        'service_description' => 'required',
        'category_id' => 'required',
        'service_price' => 'required',
        'service_tags' => 'required',
        ]);
        
        //return dd($request->all());
        //dd(  request('user_id') );
         $service =  Service::create([
               'user_id' => request('user_id'),
               'service_name' => request('service_name'),
               'service_description' => request('service_description'),
               'category_id' => request('category_id'),
               'price' => request('service_price'),
               'tags' => request('service_tags'),
            ]);
        
 
        
    if($service){
        
        return back()->with("success","{$service->service_name} successfully created");
    }else{
        return back()->withError('error','Error creating service');
    }    
    }
    
    public function destroy(Request $request)
    {
        
        $service = Service::where('id','=',$request->service_id)->delete();
        
        if($service)
        {
            return back()->with('success','Service successfully deleted');
        }else
        {
            return back()->withErrors('error','error deleting service');
        }
        
        
    }
    
    public function show($id)
    {
        $categories = Category::all();
        $service = Service::find($id);
        return view('admin.editservice',compact('service','categories'));
    }
    
    public function update(Request $request)
    {
        //return dd($request->all());
    $service =  Service::find(request('service_id'))->update([
        'service_name' => request('service_name'),
        'service_description' => request('service_description'),
        'category_id' => request('category_id'),
        'price' => request('service_price'),
        'tags' => request('tags'),
        //'service_name' => request('service_name'),
        ]); 
        return back()->with("success","Service successfully updated");
    }
    
     public function searchService(Request $request)
    {
       // return dd($request->all());
       $services = Service::where('service_name','LIKE',"%{$request->input('service')}%")->paginate(15);
       return view('admin.services',compact('services'));
    }
}
