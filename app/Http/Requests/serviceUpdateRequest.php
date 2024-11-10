<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serviceUpdateRequest extends FormRequest
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
            "name"=> 'required|string|min:3|max: 40',
            "description"=> 'required|string|min:3|max:100',
            "price"=> 'required|numeric|min:3|max:10000'
        ];
    }
}