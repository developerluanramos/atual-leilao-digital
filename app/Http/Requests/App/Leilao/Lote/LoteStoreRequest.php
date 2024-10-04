<?php

namespace App\Http\Requests\App\Leilao\Lote;

use Illuminate\Foundation\Http\FormRequest;

class LoteStoreRequest extends FormRequest
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
            "descricao" => ["required", "min:5", "max:254"],
            "plano_pagamento_uuid" => ["required", "min:5", "max:254"],
            "valor_estimado" => ["required"],
            "valor_minimo_prelance" => ["required"],
            "incide_comissao_compra" => ["required"],
            "incide_comissao_venda" => ["required"]
        ];
    }
}
