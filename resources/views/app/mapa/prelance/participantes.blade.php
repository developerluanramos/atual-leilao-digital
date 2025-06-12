@extends('app.mapa.default-header', ['titulo' => "PARTICIPANTES DO PRÉ-LANCE", 'identificador' => 'prelance-participantes'])

@section('content-mapa-prelance-participantes')
    <h2>{{ $participantes->count() }} Participantes</h2>
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>CEP/UF</th>
{{--                <th>Contatos</th>--}}
{{--                <th>Localidade</th>--}}
            </tr>
        </thead>
        <tbody>
        @forelse ($participantes as $index => $participante)
            <tr>
                <td style="text-align:left; width: 50%; font-weight: bold; padding: 8px; text-transform: uppercase">
                    {{ $participante->nome }}
                </td>
                <td style="width: 20%">
                    {{ $participante->cpf_cnpj }}
                </td>
{{--                <td style="padding: 8px; text-transform: uppercase">--}}
{{--                    {{ $participante->email }} <br>--}}
{{--                    {{ $participante->celular }}--}}
{{--                </td>--}}
                <td style="">
                    {{ $participante->cep }} - {{ $participante->uf }}
                </td>
            </tr>
        @empty
            <p>Nenhum participante encontrado.</p>
        @endforelse
        </tbody>
    </table>
@endsection

