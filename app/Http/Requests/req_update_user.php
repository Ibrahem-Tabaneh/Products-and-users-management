<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class req_update_user extends FormRequest
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
            'name'=>'required|string|max:255|regex:/^[^0-9]/',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[^0-9]/',
                Rule::unique('users', 'email')->ignore($this->route('id')),
            ],
            'usertype'=>'required',
   
        ];
    }

    public function messages()
    {
        return [

            'name.regex' => 'The name cant start with a letter',
            'email.regex' => 'The email cant start with a letter',
            'email.unique' => 'The email address is already in use.',

        ];
    }
}
