<?php

namespace App\Http\Requests\App\Prelance;

use Illuminate\Foundation\Http\FormRequest;

class PrelanceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'leilao_uuid' => ["required"],
            // 'lote_uuid' => ["required"],
            // 'prelance_config_uuid' => ["required"],
            // 'plano_pagamento_uuid' => ["required"],
            // 'realizado_em' => ["required"],
            // 'valor' => ["required"],
            // 'clientes' => ["required"],
        ];
    }
}
