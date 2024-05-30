<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	use HasFactory;

	protected $fillable = [
		"name",
		"location",
		"address",
		"company_name",
		"vendor_phone",
		"vendor_website",
		"vendor_net",
		"vendor_transport",
		"vendor_ect"
	];
}
