<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

class Document extends Eloquent
{
    
    
    protected $with = ['merchant'];
    // protected $with = ['reviews', 'merchant'];
    protected $appends = ['averageRatings', 'totalRatings']; 
    
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'amount',
        'filename',
        'photo',
        'tags',
        'signatory_no',
       // 'user_id',
        //'user_id',
        ];

    // public function previewPages()
    // {
    //     return $this->hasMany('App\Models\PreviewPages', 'document_id');
    // }
    
    // public function getAverageRatingsAttribute()
    // {
    //     return $this->reviews()->avg('ratings_score');
    // }
    
    // public function getTotalRatingsAttribute()
    // {
    //     return $this->reviews()->count();
    // }
    
    // public function reviews()
    // {
    //     return $this->hasMany('App\Models\BookReview');
    // }
    
    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
