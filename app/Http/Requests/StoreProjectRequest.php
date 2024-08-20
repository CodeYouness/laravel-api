<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "title" => ["required","string", "unique:projects", "min:4", "max:255"],
            "image" => ["required", "image", "max:3000"],
            "content" => ["required","string", "min:20"],
            "category_id" => ["required","integer", "exists:categories,id"],
            "technologies" => ["required","array", "exists:technologies,id"],
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "emmettilo sto title"
        ];
    }
}