<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Availability
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
class Availability extends Eloquent
{
    use SoftDeletes;

    protected $table = 'availability';
    
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public static function days()
	{
	    $days = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday'];
	    return $days;
	}
}
