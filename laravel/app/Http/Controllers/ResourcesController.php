<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::limit(14)->get();
        $category_first = $request->query('cat') ? 
                                    Category::find( $request->query('cat') ) :
                                    Category::first();
       
        //dd( $category_first );
        $documents = $category_first->documents()->paginate( 12 );
        // dd( $documents );
        // $documents = $documents->withPath('resources/');

        return view('resources.index', ['categories' => $categories, 
                                            'documents' => $documents]);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
