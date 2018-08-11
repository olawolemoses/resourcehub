<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdsLocation
 * 
 * @property int $id
 * @property string $location_name
 * @property string $description
 *
 * @package App\Models
 */
class AdsLocation extends Eloquent
{
	protected $table = 'ads_location';
	public $timestamps = false;

	protected $fillable = [
		'location_name',
		'description'
	];
}
