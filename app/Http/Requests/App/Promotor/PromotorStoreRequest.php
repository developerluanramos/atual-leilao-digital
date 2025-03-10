<?php

namespace App\Http\Requests\App\Promotor;

use Illuminate\Foundation\Http\FormRequest;

class PromotorStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // Defina as regras de validação aqui
            "nome" => ["required", "min:5", "max:254"],
            "email" => ["required", "email", "unique:promotor"],
            "nascido_em" => ["required", "date"]
        ];
    }
}
