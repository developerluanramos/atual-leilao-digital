@extends('app.mapa.default-header', ['titulo' => "Ordem de Entrada", 'identificador' => 'ordem-entrada'])

@section('content-mapa-ordem-entrada')
    <table class="report-table">
        <thead>
            <tr>
                <th>ORDEM</th>
                <th>LOTE</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Gênero</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lotes as $lote)
                <tr>
                    <td>{{ $lote->ordem_entrada }}ª</td>
                    <td>{{ $lote->numero }}</td>
                    <td>{{ $lote->descricao }}</td>
                    <td>{{ $lote->multiplicador }}</td>
                    <td>
                        @php
                            $generos = '';
                            foreach ($lote->itens()->pluck('genero') as $index => $genero)
                            {
                                if($index > 0) {
                                    $generos .= ' / ';
                                }
                                $generos .= $genero == 1? 'M' : 'F';
                            }
                        @endphp
                        {{$generos}}
                    </td>
                    <td>{{ $lote->vendedores()->pluck('nome')->implode(',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
