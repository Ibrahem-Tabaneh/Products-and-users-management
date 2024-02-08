<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class req_create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|regex:/^[^0-9]/',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'max:2048|mimes:png,jpeg,jpg',
        ];
    }

    
}
