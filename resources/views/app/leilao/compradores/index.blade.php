<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Compradores do Leilão</h5>
        <div class="text-sm font-medium text-blue-600 dark:text-blue-500">
            Total: <span class="text-red-600 dark:text-red-500">
                <x-layouts.badges.info-money
                    :color="'purple'"
                    :convert="true"
                    :textLength="'lg'"
                    :value="$total_geral"
                />
            </span>
        </div>
    </div>

    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($compradores as $comprador)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center w-full">
                        <div class="flex-shrink-0">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-blue-100 rounded-full dark:bg-blue-900">
                            <span class="font-medium text-blue-800 dark:text-blue-200">
                                {{ substr($comprador->cliente->nome, 0, 2) }}
                            </span>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $comprador->cliente->nome }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $comprador->cliente->documento }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-200">
                                {{ $comprador->total_compras }} {{ $comprador->total_compras > 1 ? 'lotes' : 'lote' }}
                            </span>&nbsp;
                                <x-layouts.badges.info-money
                                    :color="'purple'"
                                    :convert="false"
                                    :textLength="'sm'"
                                    :value="$comprador->valor_total"
                                />
                            </p>
                        </div>

                        <div class="inline-flex flex-col items-end">
                            <!-- Botão do dropdown -->
                            <button id="dropdownMenuIconButton{{ $comprador->cliente->uuid }}"
                                    data-dropdown-toggle="dropdownDots{{ $comprador->cliente->uuid }}"
                                    class="inline-flex items-center p-1 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots{{ $comprador->cliente->uuid }}"
                                 class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton{{ $comprador->cliente->uuid }}">
                                    <!-- Item Extrato -->
                                    <li>
                                        <a href="#"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l4-2 4 2 4-2 4 2V3l-4 2-4-2-4 2-4-2Z"/>
                                            </svg>
                                            Extrato
                                        </a>
                                    </li>

                                    <!-- Item Acerto -->
                                    <li>
                                        <a href="#"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.6-8.5h0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            Acerto
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li class="py-4 text-center">
                    <div class="text-gray-500 dark:text-gray-400">
                        Nenhum comprador registrado neste leilão
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
<br>
<br>
<br>
{{--@if($compradores->isNotEmpty())--}}
{{--    <x-pagination.simple-pagination :paginator="$compradores" />--}}
{{--@endif--}}
