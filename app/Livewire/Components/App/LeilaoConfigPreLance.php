<?php

namespace App\Livewire\Components\App;

use Carbon\Carbon;
use Livewire\Component;

class LeilaoConfigPreLance extends Component
{
    public string $prelance_aberto_em;
    public string $prelance_fechado_em;
    public int $diffInDays;
    public array $configs;
    public array $formData;

    public function __construct()
    {
        $this->prelance_aberto_em = Carbon::now()->toDateString();
        $this->prelance_fechado_em = Carbon::now()->toDateString();
        $this->diffInDays = 0;
        $this->configs = [];
    }

    public function mount(array $formData)
    {
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.components.app.leilao-config-pre-lance');
    }

    public function updatedPrelanceAbertoEm($value)
    {
        $this->gerarConfiguracoes();
    }

    public function updatedPrelanceFechadoEm($value)
    {
        $this->gerarConfiguracoes();
    }

    public function gerarConfiguracoes()
    {
        $dataAbertura = Carbon::createFromFormat('Y-m-d', $this->prelance_aberto_em);
        $dataFechamento = Carbon::createFromFormat('Y-m-d', $this->prelance_fechado_em);
        $this->diffInDays = $dataAbertura->diffInDays($dataFechamento, false);
        $this->configs = [];

        if($this->diffInDays)
        {
            for ($i = 0; $i <= $this->diffInDays; $i++)
            {
                $this->configs[] = [
                    'data' => $i > 0 ? $dataAbertura->addDay()->toDateString() : $dataAbertura->toDateString(),
                    'cor' => '#ccc',
                    'plano_pagamento_uuid' => null,
                    'valor_estimado' => 0,
                    'valor_minimo' => 0,
                    'valor_progressao' => 0,
                    'percentual_progressao' => 0,
                ];
            }
        }
    }

    public function default()
    {

    }
}
