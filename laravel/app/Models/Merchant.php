<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Merchant
 * 
 * @property int $id
 * @property int $user_id
 * @property string $store_name
 * @property string $store_name_url
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $bvn_mobile_no
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Merchant extends Eloquent
{
    use SoftDeletes;
    
	protected $casts = [
		'user_id' => 'int',
		'status' => 'int'
	];
	
	protected $appends = ['averageRatings'];

	protected $fillable = [
		'user_id',
		'store_name',
		'store_name_url',
		'store_about_us',
		'store_portfolio',
		'title',
		'firstname',
		'lastname',
		'bvn_mobile_no',
		'email_address',
		'street',
		'city',
		'state',
		'country',
		'status'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public function getAverageRatingsAttribute()
	{
	    $services = $this->services();
	    
	    $ratings = [];
	    
	    foreach( $services->get() as $service)
	    {
	        $ratings[] = $service->averageRatings;    
	    }

	    $ave = 0;
	    
	    if ( count ( $ratings ) > 0  )
    	    $ave = array_sum( $ratings )/ count( $ratings );
	    
		return $ave;
	}
	
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}	

	public function name()
	{
		return $this->firstname . ' ' . $this->lastname;
	}
	
	public function availability()
	{
	    return $this->hasMany('App\Models\Availability', 'user_id', 'user_id');
	}
	
	public function services()
	{
		return $this->hasMany('App\Models\Service', 'user_id', 'user_id');
	}

	public function documents()
	{
		return $this->hasMany('App\Models\Document', 'user_id', 'user_id');
	}
	
    public static function total_vendors(){
	    
	   $vendors = merchant::class;
	   $all_vendors = $vendors::all();
	   
	   return $all_vendors->count();
	}
}
