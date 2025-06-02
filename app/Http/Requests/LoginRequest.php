<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email" => "required|email|exists:users",
            "password" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "El email es obligatorio",
            "email.email" => "El email debe tener un formato correcto",
            "email.exists" => "No hay ninguna cuenta registrada con ese email",
            "password.required" => "El password es obligatorio",
        ];
    }
}
