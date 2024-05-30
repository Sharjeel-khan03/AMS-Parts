<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'page_title',
        'banner_image',
    ];

    public function get_page(){
        return $this->belongsTo(Page::class,'page_id');
    }
}
