@section('title', 'Visualiza Lote')

<h2 class="tittle-2 mb-3">Lote: {{$lote->descricao}} <x-layouts.badges.status-lote 
    :status="(int)$lote->status">
</x-layouts.badges.status-lote> </h2>   
{{-- @dd($lote) --}}
@livewire('components.app.lote-barra-progresso', [$lote]) 
{{-- <div class="space-y-8 lg:grid lg:grid-cols-6 pr-8 sm:gap-6 xl:gap-10 lg:space-y-0"> --}}
{{-- <div class="flex w-full mb-6 md:mb-0"> --}}
    <div class="space-y-12 mt-2  mb-lg lg:grid lg:grid-cols-4 sm:gap-4 xl:gap-4 lg:space-y-0">
       <!-- Pricing Card -->
       <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
          <h3 class="mb-4 text-2xl font-semibold">
             <x-layouts.badges.info-money
                :convert="false"
                :textLength="'lg'"
                :value="$lote->valor_comissao_compra" />
          </h3>
          <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
       </div>
       <!-- Pricing Card -->
       <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
          <h3 class="mb-4 text-2xl font-semibold">
             <x-layouts.badges.info-money
                :convert="false"
                :textLength="'lg'"
                :value="$lote->valor_comissao_venda" />
          </h3>
          <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
       </div>
       <!-- Pricing Card -->
       <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
          <h3 class="mb-4 text-2xl font-semibold">
            <x-layouts.badges.info-money
                :convert="true"
                :textLength="'lg'"
                :value="$lote->valor_comissao_total" />
          </h3>
          <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Comissão</p>
       </div>
       <!-- Pricing Card -->
       <div class="flex flex-col p-3 w-full  max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
          <h3 class="mb-4 text-2xl font-semibold">
             <x-layouts.badges.info-money
                :convert="true"
                :textLength="'lg'"
                :value="$lote->valor_total" />
          </h3>
          <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total</p>
       </div>
    </div>
 {{-- </div> --}}
{{-- </div> --}}

<div class="w-full p-4 mt-2 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Compras</h5>
</div>

<div class="flow-root">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($lote->compras as $compra)
            <li class="py-3 sm:py-4 cursor-pointer pointer">
                <div class="flex items-center w-full">
                    <div class="flex-shrink-0">
                        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($compra->cliente->nome, 0, 2)}}</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            <b>{{$compra->cliente->nome}}</b>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$compra->created_at}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            Vendedor: <b>{{$compra->vendedor->nome}}</b>
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white mr-lg">
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :value="$compra->percentual_cota"
                        ></x-layouts.badges.info-percent>
                        de
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :value="$compra->percentual_cota_vendedor"
                        ></x-layouts.badges.info-percent>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <x-layouts.badges.info-money
                            :convert="false"
                            :value="$compra->valor"
                        ></x-layouts.badges.info-money>
                    </div>
                </div>
                <div class="flex-items w-full">
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <a type="button" target="_blank" data-modal-target="{{$compra->uuid}}" data-modal-toggle="{{$compra->uuid}}" class="flex text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m8-2h3m-3 3h3m-4 3v6m4-3H8M19 4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1ZM8 12v6h8v-6H8Z"/>
                            </svg>
                            Parcelas
                        </a>
                        <a type="button" target="_blank" href="{{route('promissoria.via-cliente', ['compraUuid' => $compra->uuid])}}" class="flex text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            <span class="flex w-5 h-5 me-3 bg-red-200 rounded-full"></span>
                            Via Comprador
                        </a>
                        <a type="button" target="_blank" href="{{route('promissoria.via-vendedor', ['compraUuid' => $compra->uuid])}}" class="flex text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            <span class="flex w-5 h-5 me-3 bg-gray-200 rounded-full"></span>
                            Via Vendedor
                        </a>
                        <a type="button" target="_blank" href="{{route('promissoria.via-interna', ['compraUuid' => $compra->uuid])}}" class="flex text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            <span class="flex w-5 h-5 me-3 bg-yellow-300 rounded-full"></span>
                            Via Interna
                        </a>
                    </div>
                </div>
            </li>
            <style>
                .table-bordered { border-collapse: collapse; }
            </style>
            <x-layouts.modals.simple-modal
                :tamanho="6"
                :identificador="$compra->uuid"
                :sessao="$compra->uuid"
                :titulo="$compra->cliente->nome">
                @section($compra->uuid)
                
                <span class="content-end text-right mr-lg">
                    <x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="$compra->valor"
                    ></x-layouts.badges.info-money>
                </span>
                <div>
                    <a type="button" target="_blank" href="{{route('promissoria.via-cliente', ['compraUuid' => $compra->uuid])}}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        Via Comprador
                    </a>
                    <a type="button" target="_blank" href="{{route('promissoria.via-vendedor', ['compraUuid' => $compra->uuid])}}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        Via Vendedor
                    </a>
                    <a type="button" target="_blank" href="{{route('promissoria.via-interna', ['compraUuid' => $compra->uuid])}}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        Via Interna
                    </a>
                </div>
                
                {{-- <button id="{{$compra->uuid}}" data-dropdown-toggle="{{$compra->uuid}}" class="ml-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Promissórias
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                    
                <!-- Dropdown menu -->
                <div id="{{$compra->uuid}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{$compra->uuid}}">
                    <li>
                        <a target="_blank" href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Via Interna</a>
                    </li>
                    <li>
                        <a target="_blank" href="{{route('promissoria.via-cliente')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Via Cliente</a>
                    </li>
                    <li>
                        <a target="_blank" href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Via Vendedor</a>
                    </li>
                    </ul>
                </div> --}}
    
                <table class="table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="text-center">Status</th>
                            <th class="text-center">Data de pagamento</th>
                            <th class="text-right">R$ Comissão Compra</th>
                            <th class="text-right">R$ Comissão Venda</th>
                            <th class="text-right">R$ Valor parcela</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($compra->parcelas as $parcela)
                            <tr>
                                <td class="text-left">
                                    <x-layouts.badges.status-parcela
                                        :status="(int)$parcela['status']"
                                    />
                                </td>
                                <td class="text-center">
                                    {{$parcela['vencimento_em']}}
                                </td>
                                <td class="text-right">
                                    <x-layouts.badges.sim-nao
                                        :status="$parcela['incide_comissao_compra']"
                                    />
                                    <x-layouts.badges.info-percent
                                        :value="$parcela['percentual_comissao_comprador']"
                                    />
                                    <x-layouts.badges.info-money
                                        :convert="false"
                                        :outline="true"
                                        :value="$parcela['valor_comissao_comprador']"
                                    />
                                </td>
                                <td class="text-right text-sm">
                                    <x-layouts.badges.sim-nao
                                        :status="$parcela['incide_comissao_venda']"
                                    />
                                    <x-layouts.badges.info-percent
                                        :value="$parcela['percentual_comissao_vendedor']"
                                    />
                                    <x-layouts.badges.info-money
                                        :convert="false"
                                        :outline="true"
                                        :value="$parcela['valor_comissao_vendedor']"
                                    />
                                </td>
                                <td class="text-right">
                                    <x-layouts.badges.info-money
                                        :convert="false"
                                        :textLength="'lg'"
                                        :value="$parcela['valor']"
                                    /> ({{$parcela['repeticoes']}})
                                </td>
                            </tr>
                        @empty
                            Nenhum parcela adicionada
                        @endforelse
                    </tbody>
                </table>
                @endsection
            </x-layouts.modals.simple-modal>
        @empty
            <small class="color-red">nenhuma compra registrada neste lote</small>
        @endforelse
    </ul>
</div>
  
{{-- @dump($lote) --}}