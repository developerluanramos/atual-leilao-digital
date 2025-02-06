@extends('app.mapa.default-header', ['titulo' => "MAPA RELAÇÃO DE COMPRADORES", "identificador" => "relacao-comprador"])

@section('content-mapa-relacao-comprador')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Email</th>
                <th>Telefones</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($relacaoCompradores as $compra)
            <tr>
                <td style="text-align: left !important">
                    <b>{{$compra->cliente->nome}}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    {{$compra->cliente->email}}
                </td>
                <td class="money" style="float: right; text-align:right">
                    {{$compra->cliente->telefone}} - {{$compra->cliente->celular}}
                </td>
                <td class="money" style="float: right; text-align:right">
                    {{$compra->cliente->endereco}} - {{$compra->cliente->cep}} - {{$compra->cliente->cidade}} - {{$compra->cliente->uf}}
                </td>
            </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
    </table>
@endsection