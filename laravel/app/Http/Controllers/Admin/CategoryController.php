<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $categories = Category::paginate(15);
        return view('admin.category',compact('categories'));
    }
    
    public function create()
    {
        return view('admin.addcategory');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'status' => 'required',
        ]);
        
       $category =  Category::create([
            'category_name' => request('category_name'),
            'category_description' => request('category_description'),
            'status' => request('status')
        ]);
        
        if($category)
        {
            return back()->with('success','Success creating category');
        }else
        {
            return back()->withErrors('error','Error creating the category');
        }
       // return dd($request->all());
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.editcategory',compact('category'));
    }
    
    public function destroy(Request $request)
    {
        Category::where('id','=',request('category_id'))->delete();
        return back()->with('success','Category Successfully deleted');
    }
    
    public function update(Request $request)
    {
        
        Category::where('id','=',request('category_id'))->update([
        'category_name' => request('category_name'),
        'category_description' => request('category_description'),
        'status' => request('status')
        ]);
        
        return back()->with('success','Category Updated');
    }
    public function search(Request $request)
    {
       // return dd($request->all());
       $categories = Category::where('category_name','LIKE',"%{$request->input('category')}%")->paginate(15);
       return view('admin.category',compact('categories'));
    }
}
