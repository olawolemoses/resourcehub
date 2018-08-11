<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Review
 * 
 * @property int $id
 * @property int $service_id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property int $ratings_score
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Review extends Eloquent
{
	protected $casts = [
		'service_id' => 'int',
		'user_id' => 'int',
		'ratings_score' => 'int'
	];

	protected $fillable = [
		'service_id',
		'user_id',
		'title',
		'content',
		'ratings_score'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}
	
	public function service()
	{
		return $this->belongsTo('App\Models\Service', 'service_id');
	}
}
