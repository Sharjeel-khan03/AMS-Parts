<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id', 'vendor_id', 'ship_to', 'total', 'status', 'comments', 'terms', 'ship_via', 'requested_by', 'delivery_date', 'sub_total', 'shipping_cost', 'sales_tax'
	];

	protected $appends = ['po_number'];

	public function getPoNumberAttribute()
	{
		return str_pad($this->id, 6, '0', STR_PAD_LEFT);
	}

	public function lines()
	{
		return $this->hasMany(PurchaseOrderLine::class, 'purchase_request_id');
	}

	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'vendor_id');
	}

	public function warehouse()
	{
		return $this->belongsTo(WareHouse::class, 'ship_to');
	}
}
