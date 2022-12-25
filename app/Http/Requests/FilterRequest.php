<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'category_id' => 'required',
            'min_price' => 'numeric|min:0',
            'max_price' => 'numeric|max:10000',

        ];
    }
    public function messages()
    {
        return [

            'category_id.required' => 'категория не выбрана',
            'min_price.numeric' => 'цена указывается в цифрах'

        ];
    }

}
