<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
            ],
            'token' => [
                'required',
                Rule::exists('password_resets', 'token')
                    ->where(function ($query) {
                        $date = Carbon::now()->subMinutes(60);
                        return $query->where('email', $this->email)->where('created_at', '>', $date);
                    }),
            ],
            'password' => 'required|min:8|max:255|confirmed',
        ];
    }
}
