<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "nombre" => "required|string|min:3|max:100",
            "userName" => "required|string|min:3|max:100",
            "password" => "required|string|min:5|max:100",
            "email" => "required|string|min:3|max:100|email"
        ];
    }
    public function messages(): array
    {
        return [
            "nombre.required" => "El nombre es obligatorio",
            "nombre.min" => "El nombre debe tener al menos 3 caracteres",
            "nombre.max" => "El nombre debe tener maximo 100 caracteres",

            "userName.required" => "El user name es obligatorio",
            "userName.min" => "El user name debe tener al menos 3 caracteres",
            "userName.max" => "El user name debe tener maximo 100 caracteres",

            "password.required" => "El passoword es obligatorio",
            "password.min" => "El password debe tener al menos 5 caracteres",
            "password.max" => "El password debe tener maximo 100 caracteres",

            "email.required" => "El email es obligatorio",
            "email.min" => "El email debe tener al menos 3 caracteres",
            "email.max" => "El email debe tener maximo 100 caracteres",
            "email.email" => "El email debe tener formato de valido (@)"
        ];
    }
}
