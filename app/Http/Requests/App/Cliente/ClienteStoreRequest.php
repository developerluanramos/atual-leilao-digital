<?php

namespace App\Http\Requests\App\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
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
            "cpf_cnpj" => ["required"],
            "cep" => ["required"],
            "endereco" => ["required"],
            "numero" => ["required"],
            "uf" => ["required"],
            "cidade" => ["required"],
            "complemento" => ["required"],
            "celular" => ["required"],
            "email" => ["required"],
            "site" => ["required"],
        ];
    }
}
