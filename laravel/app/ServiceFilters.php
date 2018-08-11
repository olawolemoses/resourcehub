<?php 
namespace App;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ServiceFilters 
{
    protected $filters = ["location", "price", "category"];
    
    protected $request;
    
    protected $services;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setServices( $services )
    {
        $this->services = $services;
    }

    public function getServices()
    {
        return $this->services;
    }

    public function apply($searchService, $pages = 10)
    {
        
        $this->setServices( $searchService->get() );
        
        $services = null;
        
        foreach($this->getFilters() as $filter => $value) 
        {
            
            if( $this->hasFilter($filter) ) 
            {
                
                $services = $this->$filter($value);
                
                $this->setServices( $services );
            }
        }


        $services = $this->paginate($this->getServices(), $pages);
        
        //dd( $services);
        
        return $services;
        
    }
    
    public function getFilters( )
    {
        return $this->request->only($this->filters);
    }

    protected function hasFilter( $filter )
    {
        return (
                method_exists($this, $filter) 
                && $this->request->has($filter)
        );
    }

    protected function location($location)
    {
        $services = $this->getServices();
        
        
        $location = explode('--', $location);
        $collection = [];
        foreach ($services as $service) 
        {
            $service_location = strtolower($service->location);
            
            if (is_array($location)) {
                foreach ($location as $loci)
                    //if (preg_match("/$loci/", $merchant->city . ' ' . $merchant->state . ' ' . $merchant->country)) //edit this to equal to
                    if ($service_location == strtolower($loci) ) //edit this to equal to
                        $collection[$service->id] = $service;
            } else
                if ($service_location == strtolower($loci) ) {  //if (preg_match($location, $merchant->city . ' ' . $merchant->state . ' ' . $merchant->country))
                    $collection[$service->id] = $service;
                }
        }
        
        //dd( $collection );
        
        return $collection;
    }

    protected function price( $price )
    {
        $services = $this->getServices();
        $prices = explode('--', $price);
        $minPrice = $prices[0];
        $maxPrice = $prices[1];
        $collection = [];
        foreach ($services as $service) {
            if ($minPrice <= $service->price && $service->price <= $maxPrice) {
                $collection[] = $service;
            }
        }
        return $collection;
    }

    protected function category($categoryID)
    {
        $services = $this->getServices();
        $collection = [];
        foreach ($services as $service) {
            if ($service->category_id == $categoryID) {
                $collection[] = $service;
            }
        }
        return $collection;
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}