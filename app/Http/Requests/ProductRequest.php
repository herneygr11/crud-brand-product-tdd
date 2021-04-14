<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name"              => 'bail|required',
            "size"              => 'bail|required',
            "observations"      => 'bail|required',
            "stock"             => 'bail|required',
            "shipment"          => 'bail|required',
            "brand_id"          => 'bail|required',
        ];
    }
}
