@extends('app.mapa.default-header', ['titulo' => "Fatura Comprador", 'identificador' => 'fatura-comprador'])

@section('content-mapa-fatura-comprador')
    <div style="padding: 10px; border: dashed 1px #151515; background-color: #c7c9ca">
        <p>Comprador: <b>{{ $cliente->nome }}</b></p>
        <small>{{ $cliente->endereco }} - {{ $cliente->cidade}}  / {{ $cliente->uf }}</small><br>
        <small>{{ $cliente->celular }} / {{ $cliente->email}}</small><br>
        <small>CPF/CNPJ: {{ $cliente->cpf_cnpj }}</small>
    </div>

    <hr>

    @foreach($fatura as $item)
        <div class="section">
            <div style="padding: 10px; border: dashed 1px #004b87;">
                <p>Vendedor: <b>{{ $item['vendedor']->nome }}</b></p>
                <small>{{ $item['vendedor']->endereco }} - {{ $item['vendedor']->cidade}}  / {{ $item['vendedor']->uf }}</small><br>
                <small>{{ $item['vendedor']->celular }} / {{ $item['vendedor']->email}}</small><br>
                <small>CPF/CNPJ: {{ $item['vendedor']->cpf_cnpj }}</small>
            </div>
            <div class="lot-details">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Lote</th>
                            <th>Itens/Animais</th>
                            <th>Cota Com.</th>
                            <th>Cota Ven.</th>
                            <th>Lance</th>
                            <th>Sinal</th>
                            <th>Comissão</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($item['compras'] as $compra)
                        <tr>
                            <td style="text-align: left;">
                                <b style="font-size: 14px; color: #354c9c;">{{ $compra->lote->numero }}</b> -
                                {{ $compra->lote->descricao }}
                            </td>
                            <td style="text-align: center">{{ $compra->lote->multiplicador }}</td>
                            <td style="text-align: right">
                                <x-layouts.badges.info-percent :value="$compra->percentual_cota" />
                            </td>
                            <td style="text-align: right">
                                <x-layouts.badges.info-percent :value="$compra->percentual_cota_vendedor" />
                            </td>
                            <td style="text-align: right">
                                <x-layouts.badges.info-money :convert="false" :value="$compra->valor_lance" />
                            </td>
                            <td style="text-align: right">
                                <b><x-layouts.badges.info-money :convert="false" :value="$compra->valor_sinal_comprador" /></b>
                            </td>
                            <td style="text-align: right">
                                <b><x-layouts.badges.info-money :convert="false" :value="$compra->valor_comissao_comprador" /></b>
                            </td>
                            <td class="money"  style="text-align: right">
                                <x-layouts.badges.info-money :convert="false" :value="$compra->valor" />
                            </td>
                        </tr>

                        <tr>
                            <td colspan="8">
                                <table style="width: 100%;">
                                    @php
                                    if($compra->parcelas->count() <= 20) {
                                        $parcelas = $compra->parcelas->chunk(4);
                                    } else if($compra->parcelas->count() > 20 && $compra->parcelas->count() <= 40) {
                                        $parcelas = $compra->parcelas->chunk(8);
                                    } else if($compra->parcelas->count() > 40) {
                                        $parcelas = $compra->parcelas->chunk(12);
                                    }
                                    @endphp
                                    <tr>
                                        @forelse($parcelas as $grupo)
                                            <td style="margin-top: 0; width: 20%; padding: 2px; box-sizing: border-box; text-align: right">
                                                @foreach($grupo as $index => $parcela)
                                                    <small>
                                                        <b>{{ $parcela->numero }}</b>
                                                        {{ date('d/m/Y', strtotime($parcela->vencimento_em)) }}
                                                        <x-layouts.badges.info-money :convert="false" :value="$parcela->valor" />
                                                    </small>
                                                    <hr>
                                                @endforeach
                                            </td>
                                        @empty
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <p style="font-size: 0.8em;">Nenhuma parcela cadastrada</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="" class="text-right"><strong>Total</strong></td>
                                <td colspan="" class="text-right"><strong>{{$item['quantidade_itens']}}</strong></td>
                                <td colspan="3" class="text-right"><strong></strong></td>
                                <td class="money" style="font-weight: bold; color: white">
                                    <x-layouts.badges.info-money :value="$item['total_sinal']" />
                                </td>
                                <td class="money" style="font-weight: bold; color: white">
                                    <x-layouts.badges.info-money :value="$item['total_comissao']" />
                                </td>
                                <td class="money" style="font-weight: bold; color: white">
                                    <x-layouts.badges.info-money :value="$item['total_vendedor']" />
                                </td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    @endforeach

    <table class="report-table" style="font-size: 14px;">
        <thead>
            <tr>
                <th>Lotes</th>
                <th>Itens/Animais</th>
                <th>Total Sinal</th>
                <th>Total Comissão</th>
                <th>Total em compras</th>
                <th>Total a Pagar nesta data</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td class="money" style="font-weight: bold; color: white">{{$totais['quantidade_lotes']}}</td>
                <td class="money" style="font-weight: bold; color: white">{{$totais['quantidade_itens']}}</td>
                <td class="money" style="font-weight: bold; color: white">
                    <x-layouts.badges.info-money :value="$totais['total_sinal']" />
                </td>
                <td class="money" style="font-weight: bold; color: white">
                    <x-layouts.badges.info-money :value="$totais['total_comissao']" />
                </td>
                <td class="money" style="font-weight: bold; color: white">
                    <x-layouts.badges.info-money :value="$totais['total_geral']" />
                </td>
                <td class="money" style="font-weight: bold; color: white; font-size: 14px;">
                    <x-layouts.badges.info-money :value="$totais['total_pagar']" />
                </td>
            </tr>
        </tfoot>
    </table>
    <table class="recibo-table" style="border:solid 1px black">
        <tr>
            <td class="recibo-details" style="text-align: center; width: 50%; border-bottom: none; border-right: solid 1px black">
                Recebemos de <b>{{$cliente->nome}}</b> A quantia de
                <b><x-layouts.badges.info-money :value="$totais['total_sinal']" /></b> referente ao sinal (soma das primeiras parcelas)
            </td>
            <td class="recibo-details" style="text-align: center; width: 50%; border-bottom: none;">
                Recebemos de <b>{{$cliente->nome}}</b> A quantia de
                <b><x-layouts.badges.info-money :value="$totais['total_comissao']" /></b> referente à comissão de compras.
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50%; border-bottom: none; border-right: solid 1px black; margin-top: 10px;" class="recibo-footer">__/__/20__</td>
            <td style="text-align: center; width: 50%; border-bottom: none; margin-top: 10px" class="recibo-footer">__/__/20__</td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50%; border-bottom: none; border-right: solid 1px black " class="recibo-footer">____________________________</td>
            <td style="text-align: center; width: 50%; border-bottom: none;" class="recibo-footer">____________________________</td>
        </tr>
    </table>
    <style>
        .parcelamento-container {
            column-count: 3;
            column-gap: 20px;
        }

        .parcela-item {
            display: inline-block;
            width: 100%;
            margin-bottom: 2px;
            font-size: 9px;
            break-inside: avoid;
        }

        .parcela-linha {
            display: flex;
        }

        .parcela-numero {
            width: 40px;
            font-weight: bold;
        }

        .parcela-data {
            width: 70px;
            color: #004b87;
        }

        .parcela-valor {
            width: 80px;
            text-align: right;
            font-weight: bold;
            color: #004b87;
        }
    </style>
@endsection
