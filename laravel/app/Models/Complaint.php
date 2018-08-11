<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Complaint
 * 
 * @property int $id
 * @property int $reply_id
 * @property int $user_id
 * @property int $service_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Complaint extends Eloquent
{
	protected $casts = [
		'reply_id' => 'int',
		'user_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'reply_id',
		'user_id',
		'service_id',
		'title',
		'content'
	];
}
