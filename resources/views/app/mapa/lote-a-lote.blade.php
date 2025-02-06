@extends('app.mapa.default-header', ['titulo' => "MAPA LOTE A LOTE", 'identificador' => 'lote-a-lote'])

@section('content-mapa-lote-a-lote')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Lote</th>
                <th>Gênero</th>
                <th>Multiplicador</th>
                <th>C. Comprador</th>
                <th>C. Vendedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($leilao->lotes()->get() as $lote)
                <tr>
                    <td style="text-align: left !important">
                        0{{$lote->numero}} - <small><b>{{$lote->descricao}}</b></small><br>
                        <small>{{$lote->observacoes}}</small>
                    </td>
                    <td>
                        <small> M {{$lote->quantidade_macho}}
                        | F {{$lote->quantidade_femea}}
                        | O {{$lote->quantidade_outro}} </small>
                    </td>
                    <td style="float: right; text-align:right">{{$lote->multiplicador}}</td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->valor_comissao_compra"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->valor_comissao_venda"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'lg'"
                            :value="$lote->valor_total"
                            />
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Comprador</th>
                                    <th>Vendedor</th>
                                    <th>C. Vend</th>
                                    <th>C. Comp</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lote->compras()->with(['cliente', 'vendedor'])->get() as $compra)
                                    
                                @endforeach
                                <tr>
                                    <td>
                                        <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="$compra->percentual_cota"
                                        ></x-layouts.badges.info-percent>
                                        <small>{{$compra->cliente->nome}}</small>
                                    </td>
                                    <td>
                                        <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="$compra->percentual_cota_vendedor"
                                        ></x-layouts.badges.info-percent>
                                        <small>{{$compra->vendedor->nome}}</small>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="8"
                                            ></x-layouts.badges.info-percent>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$compra->valor_comissao_comprador"
                                            />
                                        </strong>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="10"
                                            ></x-layouts.badges.info-percent>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$compra->valor_comissao_vendedor"
                                            />
                                        </strong>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'lg'"
                                            :value="$compra->valor"
                                            />
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @empty
                <b>Nenhum lote registrado neste leilão</b>
            @endforelse
        </tbody>
    </table>
    <table class="report-table">
        <thead>
            <tr>
                <th>Valor Total Leilão</th>
                <th>Valor Comissão Comprador</th>
                <th>Valor Comissão Vendedor</th>
                <th>Valor Total Comissão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_total"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_compra"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_venda"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_total"
                        />
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
@endsection