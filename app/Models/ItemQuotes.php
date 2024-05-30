<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemQuotes extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }

     public function itemEdit()
    {
        return $this->hasone(Item::class, 'id','item_id');
    }


    public function itemView()
    {
        return $this->belongsTo(Item::class,'item_id');
    }

    public function itemuser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
   
}
