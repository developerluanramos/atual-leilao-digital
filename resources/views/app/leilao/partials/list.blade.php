<div class="flex gap-2">
    @forelse($leiloes->items() as $leilao)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img style="width: 100%" class="rounded-t-lg w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVXu3EWsouQFe0zAIVdZ0Rcl3PBlfILjy89g&s" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="{{route('leilao.show', $leilao->uuid)}}">
                            {{ $leilao->descricao }}
                        </a>
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ (new \App\Models\Leilao((array)$leilao))->lotes()->count() }} lotes
                </p>
{{--                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
{{--                    Read more--}}
{{--                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
                <a title="ACESSAR PRÉ-LANCE" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" data-popover-target="popover-hover" data-popover-trigger="hover" type="button" href="{{route('prelance.index', ["leilaoUuid" => $leilao->uuid])}}">
                    <svg class="w-4 h-4 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                    Pré-lance
                </a>
                <x-layouts.buttons.action-button
                    text="Leilão"
                    action="ver"
                    color="primary"
                    :route="route('leilao.show', $leilao->uuid)"
                />
                <x-layouts.buttons.action-button
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
            </div>
        </div>
    @empty
        <b>Nenhum leilão encontrado</b>
    @endforelse
</div>


{{--<x-layouts.tables.simple-table--}}
{{--    :headers="[--}}
{{--        'Descrição',--}}
{{--        'Qtd. Lotes',--}}
{{--        'Local',--}}
{{--        'Opções'--}}
{{--    ]"--}}
{{--    :paginator="$leiloes"--}}
{{--    :appends="$leiloes"--}}
{{-->--}}
{{--    @section('table-content')--}}
{{--        @foreach($leiloes->items() as $index => $leilao)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <a href="{{route('leilao.show', $leilao->uuid)}}">--}}
{{--                        {{ $leilao->descricao }}--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td>{{ (new \App\Models\Leilao((array)$leilao))->lotes()->count() }}</td>--}}
{{--                <td>{{ $leilao->local }}</td>--}}
{{--                <td class="text-right">--}}
{{--                    <a title="ACESSAR PRÉ-LANCE" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-popover-target="popover-hover" data-popover-trigger="hover" type="button" href="{{route('prelance.index', ["leilaoUuid" => $leilao->uuid])}}">--}}
{{--                        <svg class="w-4 h-4 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Visualizar"--}}
{{--                        action="ver"--}}
{{--                        color="primary"--}}
{{--                        :route="route('leilao.show', $leilao->uuid)"--}}
{{--                    />--}}
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Editar"--}}
{{--                        action="editar"--}}
{{--                        color="primary"--}}
{{--                        :route="route('leilao.edit', $leilao->uuid)"--}}
{{--                    />--}}
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Excluir"--}}
{{--                        action="excluir"--}}
{{--                        color="danger"--}}
{{--                        :identificador="'drawer-delete-confirmacao'"--}}
{{--                        :route="route('leilao.delete', [--}}
{{--                            'uuid' => $leilao->uuid--}}
{{--                        ])"--}}
{{--                    />--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    @endsection--}}
{{--</x-layouts.tables.simple-table>--}}
