<?php

namespace App\Http\Requests\App\Especie;

use Illuminate\Foundation\Http\FormRequest;

class EspecieStoreRequest extends FormRequest
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
            "nome" => ["required", "min:3", "max:255", "unique:especie"],
            "descricao" => ["required", "min:3", "max:255"],
        ];
    }
}
