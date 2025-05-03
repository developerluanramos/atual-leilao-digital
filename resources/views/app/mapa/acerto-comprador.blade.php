@extends('app.mapa.default-header', ['titulo' => "", 'identificador' => 'acerto-comprador'])

@section('content-mapa-acerto-comprador')
    <p>A,</p>
    <p><b>{{$cliente->nome}}</b></p>
    <p>{{$cliente->endereco}}</p>
    <p>{{$cliente->cidade}} {{$cliente->uf}}</p>
    <p></p>
    <p>{{$leilao->cidade}} / {{$leilao->uf}} , {{date('d/m/Y', strtotime($leilao->fechado_em))}}</p>
    <p>Prezado(a) Senhor(a),</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Apresentamos a seguir, demonstrativo financeiro, referente aos seus negócios realizados no dia {{date('d/m/Y', strtotime($leilao->fechado_em))}} no leilão <b>{{$leilao->descricao}}</b> no município de {{$leilao->cidade}} / {{$leilao->uf}}.</p>
    <!-- Tabela de Compras -->
    <div class="section">
        <h3>COMPRAS REALIZADAS</h3>
        <table class="report-table">
            <thead>
            <tr>
                <th>Lote</th>
                <th>Cota (%)</th>
                <th>Descrição</th>
                <th>Vendedor</th>
                <th>Data</th>
                <th>Sinal</th>
                <th>Comissão C.</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td class="text-center">{{ $compra->lote->numero }}</td>
                    <td>
                        <x-layouts.badges.info-percent :value="$compra->percentual_cota" />
                    </td>
                    <td>{{ $compra->lote->descricao }}</td>
                    <td>{{ $compra->vendedor->nome }}</td>
                    <td class="date">{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :convert="false" :value="$compra->valor_sinal_comprador" />
                    </td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :convert="false" :value="$compra->valor_comissao_comprador" />
                    </td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :convert="false" :value="$compra->valor" />
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><strong>TOTAL COMPRAS:</strong></td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money :value="$compras->sum('valor_sinal_comprador')" />
                </td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money :value="$compras->sum('valor_comissao_comprador')" />
                </td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money :value="$compras->sum('valor')" />
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

    <!-- Tabela de Vendas -->
    <div class="section">
        <h3>VENDAS REALIZADAS</h3>
        <table class="report-table">
            <thead>
            <tr>
                <th>Lote</th>
                <th>Cota (%)</th>
                <th>Descrição</th>
                <th>Comprador</th>
                <th>Data</th>
                <th>Sinal</th>
                <th>Comissão V.</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td class="text-center">
                        {{ $venda->lote->numero }}
                    </td>
                    <td>
                        <x-layouts.badges.info-percent :value="$venda->percentual_cota_vendedor" />
                    </td>
                    <td>{{ $venda->lote->descricao }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td class="date">{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :convert="false" :value="$venda->valor_sinal_vendedor" />
                    </td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :convert="false" :value="$venda->valor_comissao_vendedor" />
                    </td>
                    <td class="money">
                        <x-layouts.badges.info-money :convert="false" :value="$venda->valor" />
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><strong>TOTAL VENDAS:</strong></td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money :value="$vendas->sum('valor_sinal_vendedor')" />
                </td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money :value="$vendas->sum('valor_comissao_vendedor')" />
                </td>
                <td class="money" style="text-align: right; color: whitesmoke; font-size: 11px">
                    <x-layouts.badges.info-money
                        :value="$vendas->sum('valor')" />
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

{{--    <!-- Tabela de Resumo -->--}}
{{--    <div class="section">--}}
{{--        <h3>RESUMO FINANCEIRO</h3>--}}
{{--        <table class="report-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Item</th>--}}
{{--                <th>Valor</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                <tr>--}}
{{--                    <td style="text-align: right">Total de Compras</td>--}}
{{--                    <td class="money" style="text-align: right">--}}
{{--                        <x-layouts.badges.info-money :value="$compras->sum('valor')" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-align: right">Total de Vendas</td>--}}
{{--                    <td class="money" style="text-align: right">--}}
{{--                        <x-layouts.badges.info-money :value="$vendas->sum('valor')" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-align: right">Total de C. Comprador</td>--}}
{{--                    <td class="money" style="text-align: right">--}}
{{--                        <x-layouts.badges.info-money :value="$compras->sum('valor_comissao_comprador')" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-align: right">Total de C. Vendedor</td>--}}
{{--                    <td class="money" style="text-align: right">--}}
{{--                        <x-layouts.badges.info-money :value="$vendas->sum('valor_comissao_vendedor')" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

    <div class="section">
        <h3>A RECEBER</h3>
        <table class="report-table">
            <thead>
            <tr>
                <th>Item</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: right">Soma dos sinais das vendas</td>
                <td class="money" style="text-align: right">
                    <x-layouts.badges.info-money :value="$vendas->sum('valor_sinal_vendedor')" />
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h3>A PAGAR</h3>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right">Soma dos sinais das compras</td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :value="$compras->sum('valor_sinal_vendedor')" />
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">Comissão de comprador</td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :value="$compras->sum('valor_comissao_comprador')" />
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">Comissão de vendedor</td>
                    <td class="money" style="text-align: right">
                        <x-layouts.badges.info-money :value="$vendas->sum('valor_comissao_vendedor')" />
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: right; color: whitesmoke; font-size: 13px">TOTAL</td>
                    <td class="money" style="text-align: right; color: whitesmoke; font-size: 13px">
                        @php
                            $total = ($compras->sum('valor_sinal_vendedor') + $compras->sum('valor_comissao_comprador') + $vendas->sum('valor_comissao_vendedor')) - $vendas->sum('valor_sinal_vendedor');
                        @endphp
                        <x-layouts.badges.info-money :value="$total" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
