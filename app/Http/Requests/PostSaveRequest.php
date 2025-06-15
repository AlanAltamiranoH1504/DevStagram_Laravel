<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            "titulo" => "required|string|max:100",
            "descripcion" => "required|string|max:500",
            "idImagen" => "required|string"
        ];
    }
    public function messages(): array
    {
        return [
            "titulo.required" => "El titulo es obligatorio",
            "titulo.string" => "El titulo debe ser una cadena de texto",
            "descripcion.required" => "La descripcion es obligatoria",
            "descripcion.string" => "La descripcion deber ser una cadena de texto",
            "idImagen.required" => "La imagen es obligatoria",
        ];
    }
}
