<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\ServiceFilters;

class TagsController extends Controller
{
    //
    public function show(Request $request, $tag)
    {
        $location = $request->query('location') ?? '';
        $_token = $request->query('_token') ?? '';        
        $tagServices = Service::where('tags', 'LIKE', '%' . $tag . '%');
        $servicesCount = $tagServices->count();
        
        //$categoryServices->where('merchant') );
        //$searchService = $this->getService($q);
        $locations = Service::loadLocations($tagServices);
        $categories = Service::loadCategories($tagServices);
        $filteredServices = (new ServiceFilters($request))->apply($tagServices);
        if (count($filteredServices) != 0) {
            $services = $filteredServices;
            $servicesCount = collect($filteredServices)->count();
            $services = $services->withPath('tags/');
        } else {
            $services = $tagServices->paginate();
            //$servicesCount = $tagServices->count();
        }
        // dd( $tagServices );
        // dd( $services );
        return view('tags.show', compact('locations', 'location', '_token', 'categories', 'tag', 'services', 'servicesCount'));
    }
}
