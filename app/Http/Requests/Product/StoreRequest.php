<?php

namespace App\Http\Requests\Product;

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
			"category_id"=>["required"],
			// "currency_id"=>["required"],
			"sub_category_id"=>["required"],
			"part_no"=>["required"],
			"name"=>["required"],
			"unit_price"=>["required"],
			"description"=>["sometimes"],
			"image"=>["sometimes"],

		];
    }
}
