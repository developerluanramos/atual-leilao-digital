<div class="mt-4">
    @if ($temPreLanceVencedor)
    <div id="alert-additional-content-1" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Atenção!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            Este lote possui um pré lance vencedor, você deseja continuar com os parâmetros do pré lance> 
        </div>
        <div class="flex">
            <button wire:click="aplicarConfigPrelance()" type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
            </svg>
            Sim, quero continuar com o pré lance
            </button>
            <button wire:click="aplicarConfigLote()" type="button" class="text-blue-800 bg-transparent border border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-400 dark:hover:text-white dark:focus:ring-blue-800" data-dismiss-target="#alert-additional-content-1" aria-label="Close">
            Não quero
            </button>
        </div>
    </div>
    @endif

    @if ($usandoPrelanceConfig)
    <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Configurado pelo pré lance</h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            Você está usando as configurações do pré lance vencedor. Para alterar e usar as configurações do Lote, clique no botão abaixo.
        </div>
        <div class="flex">
            <button type="button" wire:click="aplicarConfigLote()" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
            </svg>
            Usar configurações do Lote
            </button>
        </div>
    </div>
    @endif
    
    @if (!$temPreLanceVencedor)
    <div>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                id="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pesquisar clientes"
                name="search">
        </div>
        <div wire:loading>
            Processando...
        </div>
    </div>
    @endif
    
    <br>
    @if(!empty($search) && !empty($searchResult))
        <ul class="">
            @foreach($searchResult as $result)
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
    @if(!empty($compradores) && !$temPreLanceVencedor)
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
                        :status="$this->incideComissaoCompra"
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
                        :status="$this->incideComissaoVenda"
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
                    Nenhum parcela adicionada
                @endforelse
            </tbody>
        </table>
    @empty
{{--    <p>Nenhum comprador adicionado até o momento</p>--}}
    @endforelse

    <h2 class="text-right mt-4 mb-20">

    </h2>
</div>
