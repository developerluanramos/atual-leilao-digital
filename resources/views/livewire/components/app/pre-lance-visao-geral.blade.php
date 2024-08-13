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
            <div class="flex flex-wrap -mx-3 mb-2">
                <!-- <div class="w-full md:w-2/12 md:mb-0 px-3">
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
                </div> -->
                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Vendedores</p>
                        <h1 class="text-5xl">{{3}}</h1>
                    </div>
                </div>
                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Compradores</p>
                        <h1 class="text-5xl">{{6}}</h1>
                    </div>
                </div>
                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Compra</p>
                        <p>
                            <x-layouts.badges.sim-nao
                                :status="1"
                            />
                        </p>
                        <p>
                            <x-layouts.badges.info-money
                                :value="100000"
                            />
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Vendedor</p>
                        <p>
                            <x-layouts.badges.sim-nao
                                :status="1"
                            />
                        </p>
                        <p>
                            <x-layouts.badges.info-money
                                :value="100000"
                            />
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-blue-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Total Lances</p>
                        <p>
                            <x-layouts.badges.info-money
                                :value="200000"
                            />
                        </p>
                        <p>
                            <small>
                                <x-layouts.badges.info-money-fluxo
                                    :convert="true"
                                    :value="20000"
                                />
                            </small>
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
                    <div class="max-w-sm p-2 bg-blue-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Total Vencedores</p>
                        <p>
                            <x-layouts.badges.info-money
                                :value="200000"
                            />
                        </p>
                        <p>
                            <small>
                                <x-layouts.badges.info-money-fluxo
                                    :convert="true"
                                    :value="20000"
                                />
                            </small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full mb-6 md:mb-0">
                <div class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Configurações do pré-lance</h5>
                    </div>
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

            <div class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Lotes</h5>
                </div>
                <div class="flow-root">
                    <ul>
                        @foreach($lotesLanceVencedor as $loteLanceVencedor)
                            <li class="lis">
                                <a href="#" style="background-color:{{$loteLanceVencedor['config'][random_int(0, 2)]->cor}}" class="block w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $loteLanceVencedor['numero'] }}
                                    </h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$loteLanceVencedor['maiorLance']"
                                        />
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Clientes Vencedores</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($lotesLanceVencedor as $loteLanceVencedor)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{'Nome Cliente'}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{'cliente@mail.com'}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$loteLanceVencedor['maiorLance']"
                                        />
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-3">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="true" aria-controls="accordion-collapse-body-3">
                        <span>Histórico</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                        <time class="text-lg font-semibold text-gray-900 dark:text-white">January 13th, 2022</time>
                        <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Jese Leos image"/>
                                    <div class="text-gray-600 dark:text-gray-400">
                                        <div class="text-base font-normal"><span class="font-medium text-gray-900 dark:text-white">Jese Leos</span> likes <span class="font-medium text-gray-900 dark:text-white">Bonnie Green's</span> post in <span class="font-medium text-gray-900 dark:text-white"> How to start with Flowbite library</span></div>
                                        <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z"/>
                                            </svg>
                                            Public
                                        </span> 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Bonnie Green image"/>
                                    <div>
                                        <div class="text-base font-normal text-gray-600 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Bonnie Green</span> react to <span class="font-medium text-gray-900 dark:text-white">Thomas Lean's</span> comment</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="m2 13.587 3.055-3.055A4.913 4.913 0 0 1 5 10a5.006 5.006 0 0 1 5-5c.178.008.356.026.532.054l1.744-1.744A8.973 8.973 0 0 0 10 3C4.612 3 0 8.336 0 10a6.49 6.49 0 0 0 2 3.587Z"/>
                                                <path d="m12.7 8.714 6.007-6.007a1 1 0 1 0-1.414-1.414L11.286 7.3a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.401.211.59l-6.007 6.007a1 1 0 1 0 1.414 1.414L8.714 12.7c.189.091.386.162.59.211.011 0 .021.007.033.01a2.981 2.981 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z"/>
                                                <path d="M17.821 6.593 14.964 9.45a4.952 4.952 0 0 1-5.514 5.514L7.665 16.75c.767.165 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z"/>
                                            </svg>
                                            Private
                                        </span> 
                                    </div>
                                </a>
                            </li>
                        </ol>
                    </div>
                    <div class="p-5 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                        <time class="text-lg font-semibold text-gray-900 dark:text-white">January 12th, 2022</time>
                        <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Laura Romeros image"/>
                                    <div class="text-gray-600 dark:text-gray-400">
                                        <div class="text-base font-normal"><span class="font-medium text-gray-900 dark:text-white">Laura Romeros</span> likes <span class="font-medium text-gray-900 dark:text-white">Bonnie Green's</span> post in <span class="font-medium text-gray-900 dark:text-white"> How to start with Flowbite library</span></div>
                                        <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="m2 13.587 3.055-3.055A4.913 4.913 0 0 1 5 10a5.006 5.006 0 0 1 5-5c.178.008.356.026.532.054l1.744-1.744A8.973 8.973 0 0 0 10 3C4.612 3 0 8.336 0 10a6.49 6.49 0 0 0 2 3.587Z"/>
                                                <path d="m12.7 8.714 6.007-6.007a1 1 0 1 0-1.414-1.414L11.286 7.3a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.401.211.59l-6.007 6.007a1 1 0 1 0 1.414 1.414L8.714 12.7c.189.091.386.162.59.211.011 0 .021.007.033.01a2.981 2.981 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z"/>
                                                <path d="M17.821 6.593 14.964 9.45a4.952 4.952 0 0 1-5.514 5.514L7.665 16.75c.767.165 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z"/>
                                            </svg>
                                            Private
                                        </span> 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Mike Willi image"/>
                                    <div>
                                        <div class="text-base font-normal text-gray-600 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Mike Willi</span> react to <span class="font-medium text-gray-900 dark:text-white">Thomas Lean's</span> comment</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z"/>
                                            </svg>
                                            Public
                                        </span> 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Jese Leos image"/>
                                    <div class="text-gray-600 dark:text-gray-400">
                                        <div class="text-base font-normal"><span class="font-medium text-gray-900 dark:text-white">Jese Leos</span> likes <span class="font-medium text-gray-900 dark:text-white">Bonnie Green's</span> post in <span class="font-medium text-gray-900 dark:text-white"> How to start with Flowbite library</span></div>
                                        <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z"/>
                                            </svg>
                                            Public
                                        </span> 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <img class="w-12 h-12 mb-3 me-3 rounded-full sm:mb-0" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Bonnie Green image"/>
                                    <div class="text-gray-600 dark:text-gray-400">
                                        <div class="text-base font-normal"><span class="font-medium text-gray-900 dark:text-white">Bonnie Green</span> likes <span class="font-medium text-gray-900 dark:text-white">Bonnie Green's</span> post in <span class="font-medium text-gray-900 dark:text-white"> Top figma designs</span></div>
                                        <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                                        <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                            <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="m2 13.587 3.055-3.055A4.913 4.913 0 0 1 5 10a5.006 5.006 0 0 1 5-5c.178.008.356.026.532.054l1.744-1.744A8.973 8.973 0 0 0 10 3C4.612 3 0 8.336 0 10a6.49 6.49 0 0 0 2 3.587Z"/>
                                                <path d="m12.7 8.714 6.007-6.007a1 1 0 1 0-1.414-1.414L11.286 7.3a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.401.211.59l-6.007 6.007a1 1 0 1 0 1.414 1.414L8.714 12.7c.189.091.386.162.59.211.011 0 .021.007.033.01a2.981 2.981 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z"/>
                                                <path d="M17.821 6.593 14.964 9.45a4.952 4.952 0 0 1-5.514 5.514L7.665 16.75c.767.165 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z"/>
                                            </svg>
                                            Private
                                        </span> 
                                    </div>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <hr>
            </div>
            <br>
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-4">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-4" aria-expanded="true" aria-controls="accordion-collapse-body-4">
                        <span>Gráfico evolução de lances</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                    teste
                </div>
                <hr>
            </div>
        </div>
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
                        @foreach($lotesLanceVencedor as $loteLanceVencedor)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://api.dicebear.com/9.x/lorelei/svg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{'Nome Cliente'}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{'cliente@mail.com'}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$loteLanceVencedor['maiorLance']"
                                        />
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
