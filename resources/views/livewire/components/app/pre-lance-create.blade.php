<div class="mt-4">
        @if(isset($this->lote->uuid))
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-collapse-heading-2">
                    <button wire:click="handleTab()" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                        <span>Lote {{$this->lote->id}}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="{{$hidden}}" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <div class="p-4 mb-2 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                            {{-- <small>Plano Pagamento: <b>{{ $lote->plano_pagamento()->first()->descricao }}</b></small>
                            <ul>
                                @foreach($lote->plano_pagamento()->first()->condicoes_pagamento()->get() as $condicaoPagamento)
                                    <li>
                                        <p>
                                            <small>Parcelas: <b>{{$condicaoPagamento['qtd_parcelas']}}</b></small> |
                                            <small>Repetições: <b>{{$condicaoPagamento['repeticoes']}}</b></small> |
                                            <small>Comissão Venda: <b>{{$condicaoPagamento['percentual_comissao_vendedor']}} %</b></small> |
                                            <small>Comissão Compra: <b>{{$condicaoPagamento['percentual_comissao_comprador']}} %</b></small>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                            <br> --}}
                            <small>Valor estimado para o lote: </small> <x-layouts.badges.info-money
                                textLength="sm"
                                :convert="false"
                                :value="$lote->valor_estimado"
                            />
                        </div>
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($lote->itens()->get() as $index => $item)
                                <div class="p-2 mb-2 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                    <li class="sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{$item['descricao']}}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    <small>Gênero: <b>{{ \App\Enums\GeneroLoteItemEnum::getDescription((int)$item['genero']) }}</b></small> |
                                                    <small>Espécie: <b>{{$item['especie']['nome']}}</b></small> |
                                                    <small>Raça: <b>{{$item['raca']['nome']}}</b></small>
                                                </p>
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    <small>Valor estimado: </small> <x-layouts.badges.info-money
                                                        textLength="sm"
                                                        :convert="false"
                                                        :value="$item['valor_estimado']"
                                                    />
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
            <hr>
        </div>
        @else
        <div class="lg:grid lg:grid-cols-6">
            @foreach($leilao->lotes as $index => $lote)
                <div wire:click="selecionarLote({{$lote}})"
                    style="background-color: #ccc" class="flex cursor-pointer flex-col p-4 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $index + 1 }}
                    </h5>
                    <p><x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'md'"
                        :value="$lote->lance_vencedor()->valor" /></p>
                </div>
            @endforeach
        </div>
        @endif
        
    <br>

    {{-- @if(isset($this->cliente->uuid))
        {{ $this->cliente->uuid }}
    @else

    @endif --}}

    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input
            type="text"
            wire:model.live.debounce.300ms="searchClientes"
            id="searchClientes"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Pesquisar clientes"
            name="searchClientes">
    </div>
    <div wire:loading>
        Processando...
    </div>
    <br>
    @if(!empty($searchClientes) && !empty($searchResultClientes))
        <ul class="">
            @foreach($searchResultClientes as $result)
                <li class="pb-3 sm:pb-4" wire:click="addComprador({{json_encode($result)}})">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="flex-shrink-0">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">JL</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$result['nome']}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$result['email']}} | documento: <b>{{$result['cpf_cnpj']}}</b>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    @if(!empty($compradores)  && !empty($this->lote))
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-2/12 md:mb-0 px-3">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                Valor do lance R$
            </label>
            <input
                type="text"
                wire:model.live.debounce.300ms="valorLance"
                name="valorLance"
                id="valorLance"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Vendedores</p>
                <h1 class="text-5xl">{{$this->quantidadeCompradores}}</h1>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Compradores</p>
                <h1 class="text-5xl">{{$this->quantidadeCompradores}}</h1>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Comprador</p>
                <p>
                    <x-layouts.badges.sim-nao
                        :status="$this->lote->incide_comissao_compra"
                    />
                </p>
                <p>
                    <x-layouts.badges.info-money
                        :value="$this->valorTotalComissaoComprador"
                    />
                </p>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Vendedor</p>
                <p>
                    <x-layouts.badges.sim-nao
                        :status="$this->lote->incide_comissao_venda"
                    />
                </p>
                <p>
                    <x-layouts.badges.info-money
                        :value="$this->valorTotalComissaoVendedor"
                    />
                </p>
            </div>
        </div>

        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-blue-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Total Lote</p>
                <p>
                    <x-layouts.badges.info-money
                        :value="$this->valorTotalLote"
                    />
                </p>
                <p>
                    <small>
                        <x-layouts.badges.info-money-fluxo
                            :convert="true"
                            :value="$this->diferencaValorEstimado"
                        />
                    </small>
                </p>
            </div>
        </div>
    </div>
    @endif
    @forelse($compradores as $index => $comprador)
        <div class="mt-2">
            <p>
            {{$comprador['nome']}}
            <p>
                <small>
                    {{$comprador['email']}}
                </small>
                <button
                    wire:click="removerCliente({{$index}})"
                    type="button"
                    class="float-right focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </p>
            <p>
                <small>
                    {{$comprador['endereco']}}
                </small>
            </p>

        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="text-center">Data de pagamento</th>
                    <th class="text-right">R$ Valor parcela</th>
                    <th class="text-right">R$ Comissão Compra</th>
                    <th class="text-right">R$ Comissão Venda</th>
                </tr>
            </thead>
            <tbody>
                @forelse($parcelas as $parcela)
                    <tr>
                        <td class="text-center">
                            {{$parcela['data_pagamento']}}
                        </td>
                        <td class="text-right">
                            <x-layouts.badges.info-money
                                :value="$parcela['valor']"
                            /> ({{$parcela['repeticoes']}})
                        </td>
                        <td class="text-right">
                            <x-layouts.badges.info-percent
                                :value="$parcela['percentual_comissao_comprador']"
                            />
                            <x-layouts.badges.info-money
                                :value="$parcela['valor_comissao_comprador']"
                            />
                        </td>
                        <td class="text-right">
                            <x-layouts.badges.info-percent
                                :value="$parcela['percentual_comissao_vendedor']"
                            />
                            <x-layouts.badges.info-money
                                :value="$parcela['valor_comissao_vendedor']"
                            />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Nenhum parcela adicionada</td></tr>
                @endforelse
            </tbody>
        </table>
    @empty
{{--    <p>Nenhum comprador adicionado até o momento</p>--}}
    @endforelse

    <h2 class="text-right mt-4 mb-20">

    </h2>
</div>
