<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

class OrderFulfillmentLog extends Eloquent
{

    protected $table = 'order_fulfillment_log';
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    
    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant', 'merchant_id');
    }
}
