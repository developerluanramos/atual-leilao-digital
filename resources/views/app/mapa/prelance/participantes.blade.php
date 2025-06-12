@extends('app.mapa.default-header', ['titulo' => "PARTICIPANTES DO PRÉ-LANCE", 'identificador' => 'prelance-participantes'])

@section('content-mapa-prelance-participantes')
    <h2>{{ $participantes->count() }} Participantes</h2>
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th></th>
                <th>CPF/CNPJ</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Localidade</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($participantes as $index => $participante)
            <tr>
                <td>
                    {{$index+1}}
                </td>
                <td>
                    {{ $participante->cpf_cnpj }}
                </td>
                <td style="font-weight: bold; padding: 8px; text-transform: uppercase">
                    {{ $participante->nome }}
                </td>
                <td style="font-weight: bold; padding: 8px; text-transform: uppercase">
                    {{ $participante->email }}
                </td>
                <td style="font-weight: bold; padding: 8px; text-transform: uppercase">
                    {{ $participante->celular }}
                </td>
                <td style="font-weight: bold; padding: 8px; text-transform: uppercase">
                    {{ $participante->cidade }} - {{ $participante->uf }}
                </td>
            </tr>
        @empty
            <p>Nenhum participante encontrado.</p>
        @endforelse
        </tbody>
    </table>
@endsection

