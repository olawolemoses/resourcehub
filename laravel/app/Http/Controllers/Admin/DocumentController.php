<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Category;
class DocumentController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $documents = Document::paginate(15);
        return view('admin.documents',compact('documents'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.adddocument',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
           'document_name' => 'required',
           'document_description' => 'required',
           'document_price' => 'required',
           'category_id' => 'required',
           'document_tags' => 'required',
        ]);
        //return dd($request->all());
    }
}
