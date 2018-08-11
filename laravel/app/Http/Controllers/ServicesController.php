<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\ServiceFilters;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ServicesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => 'show']);
    }

    public function index(Request $request)
    {
        $location = $request->query('location') ?? '';
        $_token = $request->query('_token') ?? '';
        $allServicesList = Service::latest();
        $locations = Service::loadLocations($allServicesList);
        $categories = Service::loadCategories($allServicesList);
        $filteredServices = (new ServiceFilters($request))->apply($allServicesList);
        // dd($filteredServices );
        if (count($filteredServices) != 0) 
        {
            $services = $filteredServices;
            $servicesCount = collect($filteredServices)->count();
            $services = $services->withPath('services/');
        }
        else
        {
            $services = $allServicesList->paginate();
            $servicesCount = Service::latest()->count();
        }
        $servicesCount = count($services);
        return view('services.index', compact('services', '_token', 'location', 'locations', 'categories', 'servicesCount'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function show(Service $service)
    {
        //$can_review = auth()->user()->customer->hasMadeOrder( $service->id );

        $reviews = $service->reviews()->latest()->paginate();
        $reviewsCount = $service->reviews()->count();
        $cartid = 12;

        return view('services.show', compact('service', 'reviews', 'reviewsCount', 'cartid'));
    }
}
