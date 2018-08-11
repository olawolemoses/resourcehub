<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class BookReview extends Eloquent
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
