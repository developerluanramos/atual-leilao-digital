<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Condições de pagamento</h5>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Descrição"
                        name="condicao.descricao"
                        model="condicao.descricao"
                        blur="default"
                        lenght="4/12"
                        :value="$condicao->descricao ?? old('descricao')"
                    />
                    <x-layouts.inputs.input-normal-number-livewire
                        label="Repetições"
                        name="condicao.repeticoes"
                        model="condicao.repeticoes"
                        blur="default"
                        change="default"
                        lenght="4/12"
                        :value="$condicao->repeticoes ?? old('repeticoes')"
                    />
                    <x-layouts.inputs.input-normal-number-livewire
                        label="Qtd de parcelas"
                        name="condicao.qtd_parcelas"
                        model="condicao.qtd_parcelas"
                        blur="default"
                        change="default"
                        lenght="4/12"
                        :value="$condicao->qtd_parcelas ?? old('qtd_parcelas')"
                    />
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-number-livewire
                        label="Comissão Vendedor"
                        name="condicao.percentual_comissao_vendedor"
                        model="condicao.percentual_comissao_vendedor"
                        blur="default"
                        change="default"
                        lenght="4/12"
                        :value="$condicao->percentual_comissao_vendedor ?? old('percentual_comissao_vendedor')"
                    />
                    <x-layouts.inputs.input-normal-number-livewire
                        label="Comissão Comprador"
                        name="condicao.percentual_comissao_comprador"
                        model="condicao.percentual_comissao_comprador"
                        blur="default"
                        change="default"
                        lenght="4/12"
                        :value="$condicao->percentual_comissao_comprador ?? old('percentual_comissao_comprador')"
                    />
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-switch-livewire
                        label="Comissão Venda"
                        name="condicao.incide_comissao_vendedor"
                        model="condicao.incide_comissao_vendedor"
                        :value="$condicao->incide_comissao_vendedor ?? old('incide_comissao_vendedor')" 
                    />
                    <x-layouts.inputs.input-switch-livewire
                        label="Comissão Compra"
                        name="condicao.incide_comissao_comprador"
                        model="condicao.incide_comissao_comprador"
                        :value="$condicao->incide_comissao_comprador ?? old('incide_comissao_comprador')" 
                    />
                </div>
                <div class="flex flex-wrap -mx-3 mb-2 ml-1">
                    <button wire:click="add" type="button" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        Adicionar
                    </button>
                </div>
                @if($errorMessage !== '')
                    <div class="flex flex-wrap -mx-3 mb-2 ml-1">
                       <small class="text-red-900">{{$errorMessage}}</small>
                    </div>
                @endif
            </li>
            @forelse($condicoes as $index => $condicao)
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$condicao['descricao']}}
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>N. repetições: </small> {{$condicao['repeticoes']}}
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>Qtd. parcelas: </small> {{$condicao['qtd_parcelas']}}
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>Comissão vendedor: </small> <x-layouts.badges.info-percent
                                        :value="$condicao['percentual_comissao_vendedor']"
                                    />
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>Comissão comprador: </small> <x-layouts.badges.info-percent
                                        :value="$condicao['percentual_comissao_comprador']"
                                    />
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>Comissão venda: </small> 
                                    <x-layouts.badges.sim-nao
                                        :status="$condicao['incide_comissao_vendedor']"
                                    />
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
                                    <small>Comissão compra: </small> 
                                    <x-layouts.badges.sim-nao
                                        :status="$condicao['incide_comissao_comprador']"
                                    />
                                </p>
                            </div>
                            <div class="items-center truncate text-base font-semibold text-gray-900 dark:text-white">
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <button
                                        wire:click="remove({{$index}})"
                                        type="button"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        data-te-ripple-init
                                        data-te-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </li>
                </div>
            @empty
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    Nenhum registro adicionado até o momento, <b>preencha o formulário</b> e clique em <b>adicionar</b> para incluir itens no lote
                </div>
            @endforelse
        </ul>
        <input type="hidden" name="condicoes_pagamento" value="{{json_encode($condicoes)}}">
    </div>
</div>
