<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	use HasFactory;

	protected $fillable = [
		"name", "commission_rate"
	];

    public function users()
    {
        return $this->belongsToMany(User::class, 'organization_users', 'organization_id', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'organization_users', 'organization_id', 'category_id');
    }
}
