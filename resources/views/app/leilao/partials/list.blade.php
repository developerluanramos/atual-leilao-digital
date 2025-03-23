<x-layouts.tables.simple-table
    :headers="[
        'Descrição',
        'Qtd. Lotes',
        'Local',
        'Opções'
    ]"
    :paginator="$leiloes"
    :appends="$leiloes"
>
    @section('table-content')
        @foreach($leiloes->items() as $index => $leilao)
            <tr>
                <td>{{ $leilao->descricao }}</td>
                <td>{{ (new \App\Models\Leilao((array)$leilao))->lotes()->count() }}</td>
                <td>{{ $leilao->local }}</td>
                <td class="text-right">
                    <a title="ACESSAR PRÉ-LANCE" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-popover-target="popover-hover" data-popover-trigger="hover" type="button" href="{{route('prelance.index', ["leilaoUuid" => $leilao->uuid])}}">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                    </a>
                    <x-layouts.buttons.action-button
                        text="Visualizar"
                        action="ver"
                        color="primary"
                        :route="route('leilao.show', $leilao->uuid)"
                    />
                    <x-layouts.buttons.action-button
                        text="Editar"
                        action="editar"
                        color="primary"
                        :route="route('leilao.edit', $leilao->uuid)"
                    />
                    <x-layouts.buttons.action-button
                        text="Excluir"
                        action="excluir"
                        color="danger"
                        :identificador="'drawer-delete-confirmacao'"
                        :route="route('leilao.delete', [
                            'uuid' => $leilao->uuid
                        ])"
                    />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
