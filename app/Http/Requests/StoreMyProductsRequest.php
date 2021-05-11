<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMyProductsRequest extends FormRequest
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
            'name' => ['required', 'max:50', 'unique:products'],
            'description' => ['required', 'max:100'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'price' => ['required', 'numeric','min:0','max:99999999999'],
            'size' => ['required', 'max:50'],
            'in_stock' => ['required', 'numeric','min:0','max:99999999999'],
            'category_id' => ['required','exists:App\Models\Category,id'],
        ];
    }
}
