<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderLine extends Model
{
	use HasFactory;

	protected $fillable = [
		'purchase_request_id', 'item_id', 'quantity', 'total_cost', 'uom', 'cost', 'status', 'receive_qty','transportation_cost'
	];

	public function item()
	{
		return $this->belongsTo(Item::class, 'item_id');
	}
}
