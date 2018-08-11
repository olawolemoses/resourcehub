<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;
/**
 * Class Service
 * 
 * @property int $id
 * @property string $service_name
 * @property string $service_description
 * @property int $merchant_id
 * @property int $category_id
 * @property string $price
 * @property string $service_photo_image
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
//Elasticsearch\Common\Exceptions\BadRequest400Exception with message 
// 'Incorrect HTTP method for uri [/default] and method [POST], allowed: [GET, HEAD, DELETE, PUT]'
class Service extends Eloquent
{
	use Searchable;

	protected $with = ['reviews', 'category', 'user'];
	
	protected $appends = ['averageRatings', 'totalRatings', 'location', 'category_name'];
	
	protected $casts = [
		'user_id' => 'int',
		'category_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'service_name',
		'service_description',
		'user_id',
		'category_id',
		'price',
		'service_photo_image',
		'tags'
	];

	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function getCategoryNameAttribute()
	{
		return $this->category->category_name;
	}

	public function getLocationAttribute()
	{
		return $this->user->profile->state;
	}

	public function reviews()
	{
		return $this->hasMany('App\Models\Review');
	}

	public function path()
	{
		return "/services/" . $this->id;
	}

	public function getAverageRatingsAttribute()
	{
		return $this->reviews()->avg('ratings_score');
	}

	public function getTotalRatingsAttribute()
	{
		return $this->reviews()->sum('ratings_score');
	}
	
	public function getServces()
	{
		return $this->reviews()->count();
	}

	public function toSearchableArray()
	{
		$record = $this->toArray();
		$record['category'] = $this->category->category_name;
		$record['merchant'] = [
			"name"=>$this->user->title . ' ' . $this->user->firstname .' '. $this->user->lastname,
			"call_bar_no"=>$this->user->merchant->call_bar_no,
			"store_name"=>$this->user->merchant->store_name
		];
		
		$record['_tags'] = explode(',', $record['tags']);
		unset($record['tags'], $record['created_at'], $record['updated_at']);
		return $record;
	}
	
	public function searchableAs()
	{
		return 'index';
	}

	public function scopeFilters($query, $filters)
	{
		return $filters->apply($query);
	}

	protected static function loadLocations($searchService)
	{
		$services = $searchService->get();
		
		$locations = [];
		foreach ($services as $service) 
		{
		    if(! is_null( $service->user ))
			    isset($locations[$service->location]) ? $locations[$service->location]++ : $locations[$service->location] = 1;
		}
		return $locations;
	}

	protected static function loadCategories($searchService)
	{
		$services = $searchService->get();
		$categories = [];
		foreach ($services as $service) {
			if (!isset($categories[$service->category_id]['count'])) {
				$categories[$service->category_id]['count'] = 1;
				$categories[$service->category_id]['name'] = $service->categoryName;
			} else {
				$categories[$service->category_id]['count']++;
			}
		}
		return $categories;
	}

	public static function tagsList(int $breaker=-1 )
	{
		$services = self::all();
		$collection = [];
		foreach ($services as $service) {
			$tags = explode(",", $service->tags);
			for ($i = 0; $i < count($tags); $i++) {
				if (isset($collection[$tags[$i]]))
					$collection[$tags[$i]]++;
				else
					$collection[$tags[$i]] = 1;
			}
		}
		arsort($collection);
		//dd($collection);
		return array_slice($collection, 0, $breaker);
	}

	public function Order()
	{
		return $this->hasOne('App\Models\Order');
	}
	
	public function hasPaid( $userID )
    {
        return \App\Models\Order::where('user_id', $userID)
               ->where('service_id', $this->id)
               ->count() > 0;
    }
}
