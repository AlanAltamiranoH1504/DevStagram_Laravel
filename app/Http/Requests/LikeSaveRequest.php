<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeSaveRequest extends FormRequest
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
            "post_id" => "required|exists:posts,id"
        ];
    }

    public function messages(): array
    {
        return [
            "post_id.required" => "El id del post es obligatorio.",
            "post_id.exists" => "El id del post no existe"
        ];
    }
}
