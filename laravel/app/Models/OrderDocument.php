<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

class OrderDocument extends Eloquent
{
    protected $casts = [
        'user_id' => 'int',
        'document_id' => 'int',
        'fulfilled' => 'int',
        'paid' => 'int',
        'payment_details' => 'array'
    ];

    protected $dates = [
        'order_date'
    ];

    protected $fillable = [
        'user_id',
        'document_id',
        'fulfilled',
        'paid',
        'order_date'
    ];

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }
    
    public function confirm( $document, $userID )
    {
         return $this->document_id == $document->id && $this->user_id == $userID ;
    }
    
    public static function total_downloaded(){
        
        $documents = OrderDocument::class;
        $all_downloaded = $documents::where('fulfilled','=',1);
        
        return $all_downloaded->count();
        
    }
    
   
}
