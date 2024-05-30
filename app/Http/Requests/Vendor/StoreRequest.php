<?php

namespace App\Http\Requests\Vendor;

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
			"name"=>["required"],
			"location"=>["required"],
			"address"=>["required"],
      "company_name"=>["required"],
			"vendor_phone"=>["required"],
			"vendor_website"=>["required"],
			"vendor_net"=>["required"],
			"vendor_transport"=>["required"],
			"vendor_ect"=>["required"],


		];
    }
}
