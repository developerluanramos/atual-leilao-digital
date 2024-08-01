<div class="mt-4">
{{--    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>--}}
{{--    <div class="relative">--}}
{{--        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">--}}
{{--            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">--}}
{{--                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <input--}}
{{--            type="text"--}}
{{--            wire:model.live.debounce.300ms="search"--}}
{{--            id="search"--}}
{{--            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--            placeholder="Pesquisar clientes"--}}
{{--            name="search">--}}
{{--    </div>--}}
{{--    <div wire:loading>--}}
{{--        Pesquisando...--}}
{{--    </div>--}}
{{--    @if(!empty($search) && !empty($searchResult))--}}
{{--        <p>search is {{$search}}</p>--}}
{{--    @endif--}}

    <div class="w-full md:w-4/12 md:mb-0">
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
{{--        --}}{{--        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesquisar</button>--}}
{{--    </div>--}}

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
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
                        />
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
    <h2 class="text-right mt-4 mb-20">
        Comissão compra: <x-layouts.badges.sim-nao
            :status="$this->formData['lote']['incide_comissao_compra']"
        />
        |
        Comissão venda: <x-layouts.badges.sim-nao
            :status="$this->formData['lote']['incide_comissao_venda']"
        />
        |
        Valor total Comissão compra:  <x-layouts.badges.info-money
            :value="$this->valorTotalComissaoComprador"
        />
        |
        Valor total Comissão venda:  <x-layouts.badges.info-money
            :value="$this->valorTotalComissaoVendedor"
        />
        |
        Valor total Lote:  <x-layouts.badges.info-money
            textLength="lg"
            :value="$this->valorTotalLote"
        />
        (<x-layouts.badges.info-money-fluxo
            :convert="true"
            :value="$this->diferencaValorEstimado"
        />)
    </h2>
</div>
