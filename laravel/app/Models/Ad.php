<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ad
 * 
 * @property int $id
 * @property int $location_id
 * @property string $title
 * @property string $description
 * @property string $banner_file_name
 * @property int $show_status
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Ad extends Eloquent
{
	protected $casts = [
		'location_id' => 'int',
		'show_status' => 'int',
		 'start_date' => 'datetime:Y-m-d H:00',
    'end_date' => 'datetime:Y-m-d H:00',
	];

	protected $dates = [
//	 'birthday' => 'date:Y-m-d',
   
	];

	protected $fillable = [
		'location_id',
		'title',
		'description',
		'banner_file_name',
		'target_url',
		'show_status',
		'start_date',
		'end_date'
	];
	
	
    public static function homeAds()
    {
       // return NOW();
        $home = Ad::where('location_id','=',0)
        ->where('end_date','<=',NOW())
        ->get();
        return $home;
    }
    
    public static function searchAds()
    {
        $searchers = Ad::where('location_id','=',1)
        ->get();
        return $searchers;
    }
}
