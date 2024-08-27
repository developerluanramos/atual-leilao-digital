<style>
    .lis {
        display: inline-block;
        padding: 1rem;
        text-align: center;
        width: 16%;
    }
</style>
<div>
    <div class="flex flex-wrap mb-2">
        <div class="w-full md:w-9/12 mb-6 md:mb-0">
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
              <h2 id="accordion-flush-heading-1">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                  <span>Configurações do pré-lance</span>
                  <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                  </svg>
                </button>
              </h2>
              <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <div class="w-full mb-6 md:mb-0">
                            <div class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <div class="flow-root">
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($leilao->config_prelance as $config)
                                            <li class="py-3 sm:py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <span style="background-color:{{$config->cor}}" class="flex w-10 h-10 me-5 mt-3 rounded-full"></span>
                                                    </div>
                                                    <div class="flex-1 min-w-0 ms-4">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Data: <b>{{ $config->data }}</b>
                                                        </p>
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Plano Pagamento: <b>{{ $config->plano_pagamento->descricao }}</b>
                                                        </p>
                                                        <ul>
                                                            @foreach($config->plano_pagamento->condicoes_pagamento as $condicaoPagamento)
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
                                                        comissão comprador
                                                        <x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'sm'"
                                                            :value="25000" />

                                                        comissão vendedor
                                                        <x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'sm'"
                                                            :value="15000" />
                                                    </div>
                                                    <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        $320
                                                    </div> -->
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                      <span>Lotes</span>
                      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                      </svg>
                    </button>
                  </h2>
                  <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <div class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flow-root">
                                <ul>
                                    @foreach($leilao->lotes as $index => $lote)
                                        <li class="lis">
                                            <a 
                                                data-modal-target="timeline-modal" data-modal-toggle="timeline-modal"
                                                style="background-color: {{ $lote->lance_vencedor()->prelance_config()->first()->cor }}" class="block w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $index + 1 }}
                                                </h5>
                                                <x-layouts.badges.info-money
                                                    :convert="false"
                                                    :textLength="'sm'"
                                                    :value="$lote->lance_vencedor()->valor" />
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <br>
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Clientes vencedores por lote</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($leilao->lotes as $lote)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                            <span class="font-medium text-gray-600 dark:text-gray-300">{{ $lote->id }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        @foreach($lote->lance_vencedor()->clientes()->get() as $index => $clienteVencedor)
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $clienteVencedor->nome }}
                                            </p>
                                        @endforeach
                                        
                                        <!-- <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $lote->id }}
                                        </p> -->
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$lote->lance_vencedor()->valor"
                                        />
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Histórico</h5>
                </div>
                <div class="flow-root">
                    <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">  
                        @foreach($leilao->lotes as $index => $lote)
                            <li class="mb-10 ms-8">            
                                <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                    {{ $lote->id }}
                                </span>
                                <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$lote->descricao}}</h6>
                                <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{$lote->created_at}}</time>
                                <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">  
                                    @foreach($lote->lances()->get()->reverse() as $index => $lance)
                                        @if($index === 0)
                                            <li class="mb-10 ms-8">            
                                                <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                      <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                                @foreach($lance->clientes()->get() as $index => $cliente)
                                                    <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$cliente->nome}}</h6> 
                                                @endforeach
                                                <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $lance->created_at }}</time>
                                                <x-layouts.badges.info-money
                                                    :convert="false"
                                                    :textLength="'sm'"
                                                    :value="$lance->valor"
                                                />
                                            </li>
                                        @else
                                            <li class="mb-10 ms-8">           
                                                <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600"> 
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                                                    </svg>
                                                </span>
                                                @foreach($lance->clientes()->get() as $index => $cliente)
                                                    <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$cliente->nome}}</h6>
                                                @endforeach
                                                <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $lance->created_at }}</time>
                                                <x-layouts.badges.info-money
                                                    :convert="false"
                                                    :textLength="'sm'"
                                                    :value="$lance->valor"
                                                />
                                            </li>
                                        @endif
                                    @endforeach                
                                </ol>
                            </li>
                        @endforeach                
                    </ol>
                </div>
            </div>
        </div>
        <br>
        <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
            <button type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
                REGISTRAR NOVO LANCE
            </button>

            <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Clientes no pré-lance</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($leilao->clientes()->get() as $cliente)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                         <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                            <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($cliente->nome, 0, 2)}}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $cliente->nome }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $cliente->email }}
                                        </p>
                                    </div>
                                    <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="100"
                                        />
                                    </div> -->
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
        </div>
    </div>
<!-- Main modal -->
<div id="timeline-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Histórico
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="timeline-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <!-- <div class="p-4 md:p-5">
                    <button class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    My Downloads
                    </button>
                </div> -->
            </div>
    </div>
</div> 
</div>