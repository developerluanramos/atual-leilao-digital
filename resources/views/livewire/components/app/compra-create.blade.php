<div class="mt-4">
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
    <br>
    @if(!empty($search) && !empty($searchResult))
        <ul class="">
{{--            <p>{{count($searchResult)}} registros encontrados</p>--}}
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
{{--                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">--}}
{{--                            $320--}}
{{--                        </div>--}}
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    @if(!empty($compradores))
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
                        :status="$this->formData['lote']['incide_comissao_compra']"
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
                        :status="$this->formData['lote']['incide_comissao_venda']"
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
{{--    <label for="valorLance" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>--}}
{{--    <div class="relative">--}}
{{--        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">--}}
{{--            Lance R$--}}
{{--        </div>--}}
{{--        <input--}}
{{--            type="text"--}}
{{--            wire:model.live.debounce.300ms="valorLance"--}}
{{--            id="valorLance"--}}
{{--            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--            placeholder="Valor lance"--}}
{{--            name="valorLance">--}}
{{--                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesquisar</button>--}}
{{--    </div>--}}
    @forelse($compradores as $index => $comprador)
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="p-3">
                    <th colspan="4" class="bg-grey-800 p-2">
                        {{$comprador['nome']}}
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
                    </th>
                </tr>
            </thead>
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
