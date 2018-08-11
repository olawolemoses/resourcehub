<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

class OrderCancelationsThread extends Eloquent
{
    protected $table = 'order_cancelations_thread';

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
