<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Vendedores do Leilão</h5>
        <div class="text-sm font-medium text-blue-600 dark:text-blue-500">
            Total Vendido: <span class="text-red-600 dark:text-red-500">
                <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'lg'"
                    :value="$total_geral"
                />
            </span>
        </div>
    </div>

    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($vendedores as $vendedor)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center w-full">
                        <div class="flex-shrink-0">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-green-100 rounded-full dark:bg-green-900">
                            <span class="font-medium text-green-800 dark:text-green-200">
                                {{ substr($vendedor->vendedor_nome, 0, 1) }}
                            </span>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $vendedor->vendedor_nome }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $vendedor->vendedor_documento }} - {{ $vendedor->endereco }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-200">
                                    {{ $vendedor->total_lotes }} {{ $vendedor->total_lotes > 1 ? 'lotes' : 'lote' }}
                                </span>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-200">
                                    {{ $vendedor->total_itens }} {{ $vendedor->total_itens > 1 ? 'itens' : 'item' }}
                                </span>
                            </p>

                        </div>

                        <div class="inline-flex items-center gap-2">
                        <span class="text-base font-semibold text-red-600 dark:text-red-500">
                            <x-layouts.badges.info-money
                                :color="'purple'"
                                :convert="false"
                                :textLength="'sm'"
                                :value="$vendedor->valor_total"
                            />
                        </span>

                            <!-- Dropdown Button -->
                            <button id="dropdownVendedorButton{{ $vendedor->vendedor_uuid }}"
                                    data-dropdown-toggle="dropdownVendedor{{ $vendedor->vendedor_uuid }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="dropdownVendedor{{ $vendedor->vendedor_uuid }}"
                                 class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownVendedorButton{{ $vendedor->vendedor_uuid }}">
                                    <!-- Relatório de Vendas -->
                                    <li>
                                        <a href="#"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l4-2 4 2 4-2 4 2V3l-4 2-4-2-4 2-4-2Z"/>
                                            </svg>
                                            Extrato
                                        </a>
                                    </li>

                                    <!-- Comissões -->
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
                        Nenhum vendedor registrado neste leilão
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>

{{--@if($vendedores->isNotEmpty())--}}
{{--    <x-pagination.simple-pagination :paginator="$vendedores" />--}}
{{--@endif--}}
