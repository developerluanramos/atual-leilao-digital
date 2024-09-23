<?php

namespace App\Http\Requests\App\Leiloeiro;

use Illuminate\Foundation\Http\FormRequest;

class LeiloeiroStoreRequest extends FormRequest
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
            "nome" => ["required", "min:3", "max:255"],
            "email" => ["required", "email", "unique:leiloeiro"],
            "nascido_em" => ["required", "date"],
        ];
    }
}
