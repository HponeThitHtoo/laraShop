<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            "title" => "required|max:255",
            "description" => "required",
            "price"=> "required|numeric",
            "user_id"=>"integer",
            "category_id"=>"integer",
            "brand_id"=>"integer",
            "quantity"=>"integer"
        ];
    }
}
