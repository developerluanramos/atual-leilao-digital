@extends('app.mapa.default-header', ['titulo' => "MAPA RELAÇÃO DE VENDEDORES", 'identificador' => 'relacao-vendedor'])

@section('content-mapa-relacao-vendedor')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Vendedor</th>
                <th>Email</th>
                <th>Telefones</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($relacaoVendedores as $compra)
                <tr>
                    <td style="text-align: left !important">
                        <b>{{$compra->vendedor->nome}}</b>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        {{$compra->vendedor->email}}
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        {{$compra->vendedor->telefone}} - {{$compra->vendedor->celular}}
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        {{$compra->vendedor->endereco}} - {{$compra->vendedor->cep}} - {{$compra->vendedor->cidade}} - {{$compra->vendedor->uf}}
                    </td>
                </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
    </table>
@endsection