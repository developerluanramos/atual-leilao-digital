@extends('app.mapa.default-header', ['titulo' => "PARTICIPANTES DO PRÉ-LANCE", 'identificador' => 'prelance-participantes'])

@section('content-mapa-prelance-participantes')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($participantes as $index => $participante)
            <tr>
                <td style="font-weight: bold; padding: 8px;">
                    {{ $participante->nome }}
                </td>
            </tr>
        @empty
            <p>Nenhum participante encontrado.</p>
        @endforelse
        </tbody>
    </table>
@endsection

