<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property int $user_type
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon $last_login
 * @property string $remember_token
 *
 * @package App\Models
 */

class User extends Model implements
	AuthenticatableContract,
	AuthorizableContract,
	CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword,  SoftDeletes;
	
	public $timestamps = false;

	// protected $appends = ['customer'];

	protected $casts = [
		'user_type' => 'int'
	];

	protected $dates = [
		'last_login',
		'created_at',
		'updated_at',
		'deleted_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'user_type',
		'username',
		'password',
		'firstname',
		'lastname',
		'last_login',
		'remember_token',
		'settings'
	];
	public function toString()
	{
		return $this->firstname .' '.$this->lastname;
	}
	
	public function name()
	{
		return $this->firstname .' '.$this->lastname;
	}

	public function profile()
	{
		return $this->hasOne('App\Models\Profile', 'user_id');
	}
	
	public function merchant()
	{
		return $this->hasOne('App\Models\Merchant', 'user_id');
	}

	public function orders()
	{
		return $this->hasMany('App\Models\Order', 'user_id');
	}
	
	public function orderDocument()
	{
		return $this->hasMany('App\Models\OrderDocument', 'user_id');
	}
	
	public function admin(){

		return $this->hasOne('App\Models\Admin');
	}
	
	 public static function total_users()
	 {
	  $total_users = User::class;
	  $all_users = count($total_users::all());
	  return $all_users;
	}
	
	public function isActivated()
	{
	    return ($this->status == 1);
	}
	
	public function review()
	{
	 return $this->hasMany('App\Models\Review');    
	}
	
}
