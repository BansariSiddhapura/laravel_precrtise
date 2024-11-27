<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        //dd($this);
        return [
            'productName' => 'required|string|max:255',
            'productCode' => 'required|string|max:100',
            'productCategory' => 'required',
            'productStatus' => 'required',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
