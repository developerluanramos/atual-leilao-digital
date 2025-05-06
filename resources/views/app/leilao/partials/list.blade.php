<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($leiloes->items() as $leilao)
        <div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 h-full">
            <a href="{{route('leilao.show', $leilao->uuid)}}" class="flex-grow">
                <img class="rounded-t-lg w-full h-48 object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVXu3EWsouQFe0zAIVdZ0Rcl3PBlfILjy89g&s" alt="Imagem do leilão" />
                <div class="p-4 flex flex-col flex-grow">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">
                        {{ $leilao->descricao }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ (new \App\Models\Leilao((array)$leilao))->lotes()->count() }} lotes
                    </p>
                </div>
            </a>
            <div class="p-4 pt-0 mt-auto">
                <div class="flex flex-wrap gap-2">
                    <a title="ACESSAR PRÉ-LANCE" class="" href="{{route('prelance.index', ['leilaoUuid' => $leilao->uuid])}}">
                        <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800"
                                type="button"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            <svg class="w-4 h-4 text-white-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                            Pré-lance
                        </button>

                    </a>
                    <a href="{{route('leilao.show', $leilao->uuid)}}" title="ABRIR">
                        <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2">
                                <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Leilão
                        </button>
                    </a>
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Leilão"--}}
{{--                        action="ver"--}}
{{--                        color="primary"--}}
{{--                        :route="route('leilao.show', $leilao->uuid)"--}}
{{--                        class="text-xs"--}}
{{--                    />--}}
                    <x-layouts.buttons.action-button
                        action="editar"
                        color="primary"
                        :route="route('leilao.edit', $leilao->uuid)"
                        class="text-xs"
                    />
{{--                    <x-layouts.buttons.action-button--}}
{{--                        text="Excluir"--}}
{{--                        action="excluir"--}}
{{--                        color="danger"--}}
{{--                        :identificador="'drawer-delete-confirmacao'"--}}
{{--                        :route="route('leilao.delete', ['uuid' => $leilao->uuid])"--}}
{{--                        class="text-xs"--}}
{{--                    />--}}
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-4 text-center py-8">
            <b class="text-gray-600 dark:text-gray-400">Nenhum leilão encontrado</b>
        </div>
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
