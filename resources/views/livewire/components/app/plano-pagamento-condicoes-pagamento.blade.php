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
    </div>
</div>
