<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * 
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $mobile_no
 * @property string $email_address
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
	protected $casts = [
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'firstname',
		'lastname',
		'street',
		'city',
		'state',
		'country',
		'mobile_no',
		'email_address',
		'status'
	];

	public function name(){
		return $this->firstname . ' ' . $this->lastname;
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function order()
	{
		return $this->hasMany('App\Models\Order');
	}
	
	public function orderDocument()
	{
		return $this->hasMany('App\Models\OrderDocument', 'customer_id');
	}
	
    public function hasMadeOrder( $serviceID )
	{
		return in_array($serviceID, $this->order()->pluck('id')->toArray());
	}
	
	public function isActivated()
	{
	    return ($this->status == 1);
	}
}
