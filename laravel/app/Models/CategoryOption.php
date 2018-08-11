<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CategoryOption
 * 
 * @property int $id
 * @property int $category_id
 * @property string $category_option
 * @property string $data_type
 *
 * @package App\Models
 */
class CategoryOption extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'category_option',
		'data_type'
	];
}
