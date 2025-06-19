<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioSaveRequest extends FormRequest
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
            "comentario" => "required|string|max:255",
            "post_id" => "required|exists:posts,id"
        ];
    }

    public function messages(): array
    {
        return [
            "comentario.required" => "El comentario es requerido",
            "comentario.string" => "El comentario debe ser texto",
            "comentario.max" => "El comentario debe tener 255 caracteres",
            "post_id.required" => "El post es requerido"
        ];
    }
}
