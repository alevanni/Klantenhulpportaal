<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this['id'];
        return [
            'id' => 'required',
            'firstName' => 'required|max:30|alpha',
            'lastName' => 'required|max:30|alpha',
            'email' => 'required|email|unique:users,email,' . $id,
            'telephone' => 'required|regex:/^\d{10}$/|size:10',
            'isAdmin' => 'required'
        ];
    }
}
