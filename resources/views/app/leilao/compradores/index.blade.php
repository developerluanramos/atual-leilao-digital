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
                                <b>{{ $comprador->cliente->nome }}</b>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $comprador->cliente->cpf_cnpj }} - {{ $comprador->cliente->endereco }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-200">
                                {{ $comprador->total_compras }} {{ $comprador->total_compras > 1 ? 'compras' : 'compra' }}
                            </span>&nbsp;

                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2">
                            <span class="text-base font-semibold text-red-600 dark:text-red-500">
                                <x-layouts.badges.info-money
                                    :color="'purple'"
                                    :convert="false"
                                    :textLength="'sm'"
                                    :value="$comprador->valor_total"
                                />
                            </span>
                            <!-- Botão do dropdown -->
                            <button id="dropdownMenuIconButton{{ $comprador->cliente->uuid }}"
                                    data-dropdown-toggle="dropdownDots{{ $comprador->cliente->uuid }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>
                            <div id="dropdownDots{{ $comprador->cliente->uuid }}"
                                 class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton{{ $comprador->cliente->uuid }}">
                                    <!-- Item Extrato -->
                                    <li>
                                        <a target="_blank" href="{{route('leilao.mapa.fatura-comprador', [
                                                    'uuid' => $leilao->uuid,
                                                    'clienteUuid' => $comprador->cliente->uuid
                                                 ])}}"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l4-2 4 2 4-2 4 2V3l-4 2-4-2-4 2-4-2Z"/>
                                            </svg>
                                            Fatura
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{route('leilao.mapa.acerto-comprador', ['uuid' => $leilao->uuid, 'clienteUuid' => $comprador->cliente->uuid])}}"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.6-8.5h0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            Acerto
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{route('leilao.mapa.contratos-comprador', ['uuid' => $leilao->uuid, 'clienteUuid' => $comprador->cliente->uuid])}}"
                                           class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-5 h-5 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z" clip-rule="evenodd"/>
                                            </svg>
                                            Contratos
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
