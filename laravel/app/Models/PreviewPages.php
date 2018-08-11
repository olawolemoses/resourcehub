<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Reliese\Database\Eloquent\Model as Eloquent;

class PreviewPages extends Eloquent
{
    protected $table = "preview_pages";
    
    protected $fillable = [ 
        'document_id', 
        'page_num', 
        'page_preview_file'
    ];
}
