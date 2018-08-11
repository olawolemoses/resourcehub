<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $service_id
 * @property int $fulfilled
 * @property int $paid
 * @property \Carbon\Carbon $order_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	protected $casts = [
		'customer_id' => 'int',
		'service_id' => 'int',
		'fulfilled' => 'int',
		'paid' => 'int',
		'payment_details' => 'array'
	];

	protected $dates = [
		'order_date'
	];

	protected $fillable = [
		'customer_id',
		'service_id',
		'fulfilled',
		'paid',
		'order_date'
	];

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer');
	}

	public function service()
	{
		return $this->belongsTo('App\Models\Service', 'service_id');
	}
	
	public function cancelation()
	{
		return $this->hasOne('App\Models\OrderCancelation', 'order_id');
	}
	
	public function fulfilments()
    {
        return $this->hasMany('App\Models\OrderFulfillmentLog', 'order_id');
    }
}
