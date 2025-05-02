@extends('app.mapa.default-header', ['titulo' => "VENDEDORES", 'identificador' => 'prelance-vendedor'])

@section('content-mapa-prelance-vendedor')

{{-- <table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Cota</th>
            <th>Qtd</th>
            <th>Lote</th>
            <th>Lance</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($lotes->sortBy('numero') as $lote)
            <tr>
                <td style="text-align: left !important; background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; text-align:center">
                            <x-layouts.badges.info-percent
                                :convert="false"
                                :textLength="'sm'"
                                :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_comprador"
                            />
                        </span>
                    </div>
                </td>
                <td>
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->vendedores[0]->pivot->percentual_cota"
                    />
                </td>
                <td>
                    <b>{{ $lote->multiplicador }}</b>
                </td>
                <td style="float: left; text-align:left">
                    <b>{{ $lote->numero }} - {{ $lote->descricao }}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()?->valor"
                    />
                </td>
                <td class="money" style="float: right; text-align:right; color:blue">
                    <x-layouts.badges.info-money
                        :textLength="'sm'"
                        :value="$lote->valor_prelance"
                    />
                </td>
            </tr>
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td>{{$lotes->sum('multiplicador')}}</td>
            <td></td>
            <td></td>
            <td style="font-size: 14px">
                <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance')"
                />
            </td>
        </tr>
    </tfoot>
</table> --}}

<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th>Lote</th>
            <th>Cota</th>
            <th>Qtd</th>
            <th></th>
            <th>Lance</th>
            <th>Comissão</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            // Agrupa os lotes por vendedor (considerando o primeiro vendedor de cada lote)
            $lotesPorVendedor = $lotes->sortBy('numero')->groupBy(function($lote) {
                return $lote->vendedores->first()->nome; // Assumindo que há um campo 'nome' no modelo Vendedor
            });
        @endphp

        @forelse ($lotesPorVendedor as $vendedor => $lotesDoVendedor)
            <tr style="background-color: #090b85; color: white">
                <td colspan="7" style="font-weight: bold; padding: 8px;">
                    {{ $vendedor }}
                </td>
            </tr>

            @foreach ($lotesDoVendedor as $lote)
                <tr>
                    <td style="float: left; text-align:left">
                        <b>{{ $lote->numero }} - {{ $lote->descricao }}</b>
                    </td>
                    <td>
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->vendedores[0]->pivot->percentual_cota"
                        />
                    </td>
                    <td>
                        <b>{{ $lote->multiplicador }}</b>
                    </td>
                    <td style="text-align: center !important; background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; width: 50px;">
                        <div class="flex-shrink-0">
                            <span style="background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; text-align:center">
                                <x-layouts.badges.info-percent
                                    :convert="false"
                                    :textLength="'sm'"
                                    :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_comprador"
                                />
                            </span>
                        </div>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->prelance_vencedor()?->valor"
                        />
                    </td>

                    <td class="money" style="float: right; text-align:right">
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_vendedor"
                        />
                        <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->valor_prelance_comissao_venda"
                        />
                    </td>
                    <td class="money" style="float: right; text-align:right; color:blue">
                        <x-layouts.badges.info-money
                            :textLength="'sm'"
                            :value="$lote->valor_prelance"
                        />
                    </td>
                </tr>
            @endforeach
            {{-- @dd($lotesDoVendedor) --}}
            <!-- Linha de subtotal por vendedor -->
            <tr style="background-color: #f0f0f0;">
                <td colspan="2" style="float: left; text-align:left;"><strong>Média por animal</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="float: right; text-align:right;">
                    {{-- <x-layouts.badges.info-money
                        :textLength="'sm'"
                        :value="$lotesDoVendedor->sum('valor_prelance_comissao_venda') / $lotesDoVendedor->sum('multiplicador')"
                    /> --}}
                </td>
                <td style="float: right; text-align:right;">
                    <x-layouts.badges.info-money
                        :textLength="'sm'"
                        :value="$lotesDoVendedor->sum('valor_prelance') / $lotesDoVendedor->sum('multiplicador')"
                    />
                </td>
            </tr>
            <tr style="background-color: #f0f0f0;">
                <td colspan="2" style="float: left; text-align:left;"><strong>Subtotal</strong></td>
                <td><strong>{{ $lotesDoVendedor->sum('multiplicador') }}</strong></td>
                <td></td>
                <td></td>
                <td class="money" style="float: right; text-align:right; font-weight: bold;">
                    <x-layouts.badges.info-money
                        :textLength="'lg'"
                        :value="$lotesDoVendedor->sum('valor_prelance_comissao_venda')"
                    />
                </td>
                <td class="money" style="float: right; text-align:right; font-weight: bold;">
                    <x-layouts.badges.info-money
                        :textLength="'sm'"
                        :value="$lotesDoVendedor->sum('valor_prelance')"
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6"><b>Nenhuma compra registrada neste leilão</b></td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td><strong>Média geral por animal</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                {{-- <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance_comissao_venda') / $lotes->sum('multiplicador')"
                /> --}}
            </td>
            <td style="float: right; text-align:right;">
                <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance') / $lotes->sum('multiplicador')"
                />
            </td>
        </tr>
        <tr>
            <td><strong>Total Geral</strong></td>
            <td></td>
            <td><strong>{{ $lotes->sum('multiplicador') }}</strong></td>
            <td></td>
            <td></td>
            <td style="font-size: 14px; font-weight: bold;">
                <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance_comissao_venda')"
                />
            </td>
            <td style="font-size: 14px; font-weight: bold;">
                <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance')"
                />
            </td>
        </tr>
    </tfoot>
</table>

@endsection
