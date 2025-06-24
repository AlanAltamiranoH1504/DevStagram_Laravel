<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return [
            "name" => "required|string|min:3|max:100",
            "username" => [
                "required",
                "string",
                "min:3",
                "max:100",
                Rule::unique("users")->ignore(auth()->id())
            ],
            "password" => "required|string|min:5|max:100",
            "email" => [
                "required",
                "string",
                "min:3",
                "max:100",
                "email",
                Rule::unique("users")->ignore(auth()->id())
            ],
            "imagen" => "mimes:jpeg,jpg,png|nullable",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El nombre es obligatorio",
            "name.min" => "El nombre debe tener al menos 3 caracteres",
            "name.max" => "El nombre debe tener maximo 100 caracteres",

            "username.required" => "El user name es obligatorio",
            "username.min" => "El user name debe tener al menos 3 caracteres",
            "username.max" => "El user name debe tener maximo 100 caracteres",
            "username.unique" => "El nombre de usuario ya se encuentra registrado",

            "password.required" => "El passoword es obligatorio",
            "password.min" => "El password debe tener al menos 5 caracteres",
            "password.max" => "El password debe tener maximo 100 caracteres",

            "email.required" => "El email es obligatorio",
            "email.min" => "El email debe tener al menos 3 caracteres",
            "email.max" => "El email debe tener maximo 100 caracteres",
            "email.email" => "El email debe tener formato de valido (@)",
            "email.unique" => "El email ya está registrado",

            "imagen.mimes" => "El archivo debe ser jpeg, jpg o png"
        ];
    }
}
