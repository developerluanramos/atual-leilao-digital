<?php

namespace App\Http\Requests\App\Leiloeiro;

use Illuminate\Foundation\Http\FormRequest;

class LeiloeiroUpdateRequest extends FormRequest
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
            "uuid" => ["uuid", "exists:leiloeiro,uuid"],
            "nome" => ["required", "min:3", "max:255"],
            "email" => ["required", "email"],
            "nascido_em" => ["required", "date"],
        ];
    }
}
