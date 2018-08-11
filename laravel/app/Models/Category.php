<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $category_name
 * @property string $category_description
 * @property string $picture
 * @property int $active
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int'
	];

	protected $fillable = [
		'category_name',
		'category_description',
		'picture',
		'status'
	];

	public function services()
	{
		return $this->hasMany('App\Models\Service');
	}

	public function path()
	{
		return "/categories/" . $this->id;
	}

	public function documents()
	{
		return $this->hasMany('App\Models\Document', 'category_id');
	}
	

}
