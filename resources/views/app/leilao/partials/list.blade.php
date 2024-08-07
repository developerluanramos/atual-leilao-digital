<x-layouts.tables.simple-table
    :headers="[
        'uuid',
        'Descrição',
        'Promotor',
        'Leiloeiro',
        'Local',
        'Cidade',
        'Opções'
    ]"
    :paginator="$leiloes"
    :appends="$leiloes"
>
    @section('table-content')
        @foreach($leiloes->items() as $index => $leilao)
            <tr>
                <td>{{ $leilao->uuid }}</td>
                <td>{{ $leilao->descricao }}</td>
                <td>{{ $leilao->promotor['nome'] }}</td>
                <td>{{ $leilao->leiloeiro['nome'] }}</td>
                <td>{{ $leilao->local }}</td>
                <td>{{ $leilao->cidade }}</td>
                <td class="text-right">
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Excluir"--}}
{{--                        action="excluir"--}}
{{--                        color="danger"--}}
{{--                        :identificador="'drawer-delete-confirmacao'.$setor->uuid"--}}
{{--                        :route="route('setor.delete', [--}}
{{--                                'uuid' => $setor->uuid--}}
{{--                            ])"--}}
{{--                    />--}}
                    <x-layouts.buttons.action-button
                        text="Visualizar"
                        action="ver"
                        color="primary"
                        :route="route('leilao.show', $leilao->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
