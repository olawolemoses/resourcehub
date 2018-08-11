<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ActivityLog
 * 
 * @property int $id
 * @property int $user_id
 * @property string $activity
 * @property \Carbon\Carbon $date_created
 *
 * @package App\Models
 */
class ActivityLog extends Eloquent
{
	protected $table = 'activity_log';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'date_created'
	];

	protected $fillable = [
		'user_id',
		'activity',
		'date_created'
	];
}
