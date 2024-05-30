<?php

namespace App\Http\Requests\PurchaseOrder;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			"user_id" => ["required"],
			"vendor_id" => ["required"],
			"ship_to" => ["required"],
			"total" => ["sometimes"],
			"status" => ["sometimes"],
			"delivery_date" => ["sometimes"],
			"requested_by" => ["sometimes"],
			"ship_via" => ["sometimes"],
			"terms" => ["sometimes"],
			"comments" => ["sometimes"],
			"sub_total" => ["sometimes"],
			"shipping_cost" => ["sometimes"],
			"sales_tax" => ["sometimes"],
			"total" => ["sometimes"],
			"transportation_cost" => ["sometimes"],
			"lines" => ["sometimes"],
		];
	}

	public function prepareForValidation()
	{
		$this->merge([
			"user_id" => auth()->id(),
			"status" => 1,
		]);
	}
}
