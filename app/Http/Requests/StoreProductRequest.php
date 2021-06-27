<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Název produktu je povinný',
            'short_description.required' => 'Krátký popis produktu je povinný',
            'description.required' => 'Popis produktu je povinný',
            'price.required' => 'Cena produktu je povinná',
            'name.unique' => 'Tento produkt již existuje. Zvolte jiný název',
        ];
    }
}
