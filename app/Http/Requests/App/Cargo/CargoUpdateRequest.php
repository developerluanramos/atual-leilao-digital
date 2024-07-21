<?php

namespace App\Http\Requests\App\Cargo;

use App\Enums\SituacaoCargoEnum;
use App\Repositories\Cargo\LeilaoRepositoryInterface;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class CargoUpdateRequest extends FormRequest
{
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    )
    { }
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
            "uuid" => ["uuid", "exists:cargos,uuid"],
            "nome" => [
                "required", "min:5", "max:254"
            ],
            "situacao" => [
                "required"
            ],
        ];
    }

    public function passedValidation()
    {
        if ($this->situacao == SituacaoCargoEnum::INATIVO) {
            $cargo = $this->repository->find($this->uuid);
            if ($cargo->servidores->count() > 0) {
                throw new Exception("Este objeto possui relacionamento ativo, por isso não pode ser inativado");
            }
        }
    }
}
