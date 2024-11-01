<?php

namespace App\Http\Requests\App\Compra;

use Illuminate\Foundation\Http\FormRequest;

class CompraStoreRequest extends FormRequest
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
            "leilao_uuid" => ["required"],
            "lote_uuid" => ["required"],
            'plano_pagamento_uuid' => ["required"],
            'valor' => ["required"],
            'valor_comissao_vendedor' => ["required"],
            'valor_comissao_comprador' => ["required"],
            'clientes' => ["required"],
            'parcelas' => ["required"]
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    static function rulesForLivewire(): array
    {
        return [
            "leilao_uuid" => ["required"],
            "lote_uuid" => ["required"],
            'plano_pagamento_uuid' => ["required"],
            'valor' => ["required"],
            'valor_comissao_vendedor' => ["required"],
            'valor_comissao_comprador' => ["required"],
            'clientes' => ["required"],
            'parcelas' => ["required"]
        ];
    }
}
