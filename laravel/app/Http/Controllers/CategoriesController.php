<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\ServiceFilters;
use App\Models\Service;
use App\Helpers as Helpers;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show(Request $request, Category $category)
    {
        
        $location = $request->query('location') ?? '';
        $_token = $request->query('_token') ?? '';
        $categoryServices = $category->services();
        $locations = Service::loadLocations($categoryServices);
        $categories = Service::loadCategories($categoryServices);
        $filteredServices = (new ServiceFilters($request))->apply($categoryServices, 5);

        $servicesCount = 0;
        if (count($filteredServices) != 0)  {
            $services = $filteredServices;
            $servicesCount = collect($filteredServices)->count();
            $services = $services->withPath('categories/' . $category->id . "/");
        }
        else {
            $services = $categoryServices->paginate();
            $servicesCount =   $categoryServices->count();
        }
        //dd( $services );
        
        return view('categories.show', compact('locations', 'categories', 'location', '_token', 'category', 'services', 'servicesCount') );
    }
}
