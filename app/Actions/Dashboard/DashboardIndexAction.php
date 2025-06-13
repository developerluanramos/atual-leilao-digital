<?php

namespace App\Actions\Dashboard;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use App\Models\Lote;
use App\Models\LoteItem;

class DashboardIndexAction
{
    public function __construct(

    ) { }

    public function exec(): array
    {
        return [
            'quantitativos' => [
                'leilao' => Leilao::count(),
                'lote' => Lote::count(),
                'item' => LoteItem::count(),
                'cliente' => Cliente::count(),
                'vendido' => Compra::sum('valor'),
            ]
        ];
    }
}
