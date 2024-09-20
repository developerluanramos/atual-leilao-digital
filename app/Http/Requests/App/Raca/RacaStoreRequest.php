<?php

namespace App\Http\Requests\App\Raca;

use Illuminate\Foundation\Http\FormRequest;

class RacaStoreRequest extends FormRequest
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
            "nome" => ["required", "min:3", "max:255", "unique:raca"],
            "descricao" => ["required", "min:3", "max:255"]
        ];
    }
}
