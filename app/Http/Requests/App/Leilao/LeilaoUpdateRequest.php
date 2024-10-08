<?php

namespace App\Http\Requests\App\Leilao;

use Illuminate\Foundation\Http\FormRequest;

class LeilaoUpdateRequest extends FormRequest
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
            "uuid" => ["uuid", "exists:especie,uuid"],
            "descricao" => ["required", "min:3", "max:255"],
            "denominacao" => ["required", "min:3", "max:255"],
            "local" => ["string"],
            "data_abertura" => ["required", "date"],
            "data_fechamento" => ["required", "date"],
            "prelance_aberto_em" => ["required", "date"],
            "prelance_fechado_em" => ["required", "date"],
            "cep" => ["required", "string"],
            "uf" => ["required", "string"],
            "cidade" => ["required", "string"],
            "leiloeiro_uuid" => ["required", "string"],
            "pregoeiro_uuid" => ["required", "string"],
            "promotor_uuid" => ["required", "string"],
            "configPreLance" => ["required"]
        ];

    }
}
