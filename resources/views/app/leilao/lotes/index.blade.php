<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lotes->items() as $index => $lote)
                <li class="py-3 sm:py-4 cursor-pointer pointer">
                    {{-- @livewire('components.app.lote-barra-progresso', [new App\Models\Lote((array)$lote)]) --}}
                    <div class="flex items-center w-full mt-2">
                        <div class="flex-shrink-0">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">{{$lote->numero}}</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <b>{{$lote->descricao}}</b>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$lote->plano_pagamento['descricao']}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <x-layouts.badges.status-lote 
                                    :status="(int)$lote->status">
                                </x-layouts.badges.status-lote>
                            </p>
                        </div>
                        {{-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white mr-lg">
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400 p-2">
                                {{$lote->updated_at_for_humans}}
                            </p>
                        </div> --}}
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            @if ($lote->status == App\Enums\StatusLoteEnum::ABERTO)
                                <a class="mt-sm" title="REALIZAR VENDA DO LOTE" href="{{route('compra.create', ['loteUuid' => $lote->uuid])}}">
                                    <button
                                        type="button"
                                        class="text-blue-700 mt-2 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </a>
                            @endif
                            <x-layouts.buttons.action-button
                                text="Ver"
                                action="ver"
                                color="secondary"
                                :route="route('leilao.lote.show', ['uuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])"/>
                            <x-layouts.buttons.action-button
                                text="Editar"
                                action="editar"
                                color="primary"
                                :route="route('leilao.lote.edit', ['uuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])"/>
                            <x-layouts.buttons.action-button
                                text="Excluir"
                                action="excluir"
                                color="danger"
                                :identificador="'drawer-delete-confirmacao'"
                                :route="route('leilao.lote.delete', [
                                    'uuid' => $leilao->uuid,
                                    'loteUuid' => $lote->uuid 
                                ])"
                            />
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<x-pagination.simple-pagination :paginator="$lotes" :appends="['aba' => $aba]" />
