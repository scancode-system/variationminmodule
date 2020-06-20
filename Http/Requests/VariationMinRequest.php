<?php

namespace Modules\VariationMin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class VariationMinRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'group' => '',
            'variation_id' => 'required|integer|min:1',
            'value' => 'required|string',
            'min_qty' => 'integer|min:1'
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
