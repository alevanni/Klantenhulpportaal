<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|max:30|alpha',
            'last_name' => 'required|max:30|alpha',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8',
            'telephone' => 'required|regex:/^\d{10}$/|size:10'

        ];
    }
}
