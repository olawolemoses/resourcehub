<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

class OrderCancelation extends Eloquent
{
    //
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    
        
    public function thread()
    {
        return $this->hasMany('App\Models\OrderCancelationsThread', 'order_cancelation_id');
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'user_id');
    }
}
