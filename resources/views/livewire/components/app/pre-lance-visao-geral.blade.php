<div>
    <div class="flex flex-wrap mb-2">
        <div class="w-full md:w-9/12 mb-6 md:mb-0">
            <div class="flex w-full md:w-12/12 mb-6 md:mb-0">
                <div class="space-y-12 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                    <!-- Pricing Card -->
                    <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">
                            <x-layouts.badges.info-money
                                :convert="true"
                                :textLength="'lg'"
                                :value="$leilao->valor_comissao_compra" />
                        </h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
                    </div>
                    <!-- Pricing Card -->
                    <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">
                            <x-layouts.badges.info-money
                                :convert="true"
                                :textLength="'lg'"
                                :value="$leilao->valor_comissao_venda" />
                        </h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
                    </div>
                    <!-- Pricing Card -->
                    <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">
                            <x-layouts.badges.info-number
                                :textLength="'lg'"
                                :value="$leilao->lotes->count()" />
                        </h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Lotes</p>
                    </div>
                    <!-- Pricing Card -->
                    <div class="flex flex-col p-6 w-full  max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">
                            <x-layouts.badges.info-money
                                :convert="true"
                                :textLength="'lg'"
                                :value="$leilao->valor_comissao_total" />
                        </h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Comissão</p>
                    </div>
                </div>
            </div>
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
                        <span>Lotes</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" data-accordion="collapse" aria-labelledby="accordion-flush-heading-2">
                        <div class="space-y-8 lg:grid lg:grid-cols-6 pr-8 sm:gap-6 xl:gap-10 lg:space-y-0">
                            @foreach($leilao->lotes as $index => $lote)
                                <div data-modal-target="{{$lote->uuid}}" data-modal-toggle="{{$lote->uuid}}"
                                    style="background-color: {{ $lote->lance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc' }}" class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $index + 1 }}
                                    </h5>
                                    <p><x-layouts.badges.info-money
                                        :convert="false"
                                        :textLength="'md'"
                                        :value="$lote->lance_vencedor()?->valor ?? 0" /></p>
                                </div>
                                <x-layouts.modals.simple-modal
                                    :tamanho="4"
                                    :identificador="$lote->uuid"
                                    :sessao="$lote->uuid"
                                    :titulo="'Lote '.$lote->id">
                                        @section($lote->uuid)
                                        <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                            </svg>
                                            REGISTRAR NOVO LANCE
                                        </a>
                                        <small>
                                            Valor atingido 
                                            <x-layouts.badges.info-money
                                                :convert="true"
                                                :textLength="'md'"
                                                :value="$lote->valor_prelance" />
                                            &nbsp 
                                            x
                                            &nbsp 
                                            Valor estimado
                                            <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'md'"
                                                :value="$lote->valor_estimado" />
                                            
                                        </small>
                                        <div class="w-full bg-gray-200 dark:bg-gray-700 text-center">
                                            <div class="bg-blue-600 text-xs text-blue font-medium text-blue-100 text-center p-1.5 leading-none" style="width: {{ $lote->valor_prelance_percentual_valor_estimado }}%"> 
                                            </div>
                                        </div>
                                        <small>
                                            <x-layouts.badges.info-percent
                                                :convert="false"
                                                :textLength="'md'"
                                                :value="$lote->valor_prelance_percentual_valor_estimado" /> 
                                        </small>
                                        <div class="flex w-full md:w-12/12 mb-6 md:mb-0">
                                            <div class="space-y-12 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                                                <!-- Pricing Card -->
                                                <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                                    <h3 class="mb-4 text-2xl font-semibold">
                                                        <x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'xs'"
                                                            :value="$lote->valor_comissao_compra" />
                                                    </h3>
                                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
                                                </div>
                                                <!-- Pricing Card -->
                                                <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                                    <h3 class="mb-4 text-2xl font-semibold">
                                                        <x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'xs'"
                                                            :value="$lote->valor_comissao_venda" />
                                                    </h3>
                                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
                                                </div>
                                                <!-- Pricing Card -->
                                                <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                                    <h3 class="mb-4 text-2xl font-semibold">
                                                        <x-layouts.badges.info-number
                                                            :textLength="'xs'"
                                                            :value="$lote->lances->count()" />
                                                    </h3>
                                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Lances</p>
                                                </div>
                                                <!-- Pricing Card -->
                                                <div class="flex flex-col p-3 w-full  max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                                    <h3 class="mb-4 text-2xl font-semibold">
                                                        <x-layouts.badges.info-money
                                                            :convert="true"
                                                            :textLength="'xs'"
                                                            :value="$lote->valor_comissao_total" />
                                                    </h3>
                                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Comissão</p>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="mt-6">Histórico de lances</small>
                                        <ol class="mt-6 relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">
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
                                                        <small class="flex">
                                                            <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span><x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'sm'"
                                                            :value="$lance->valor"
                                                            />
                                                        </small>
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
                                                        <small class="flex">
                                                            <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span><x-layouts.badges.info-money
                                                            :convert="false"
                                                            :textLength="'sm'"
                                                            :value="$lance->valor"
                                                            />
                                                        </small>
                                                    </li>
                                                @endif
                                            @endforeach                
                                        </ol>
                                    @endsection
                                </x-layouts.modals.simple-modal>
                            @endforeach
                        </div>
                </div>
                <h2 id="accordion-flush-heading-3">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                    <span>Clientes vencedores por lote</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
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
                                        @foreach($lote->lance_vencedor()?->clientes()?->get() ?? [] as $index => $clienteVencedor)
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $clienteVencedor->nome }}
                                            </p>
                                        @endforeach
                                        <small>
                                            c. compra:
                                            <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="$lote->valor_comissao_compra"
                                            />

                                            &nbsp c. venda:
                                            <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="$lote->valor_comissao_venda"
                                            />
                                        </small>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'lg'"
                                            :value="$lote->lance_vencedor()?->valor ?? 0"
                                            /><br>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-4">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                    <span>Histórico</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
                </h2>
                <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                    <div class="flow-root">
                        <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mt-2 mb-4 md:mb-5">
                            @foreach($leilao->lotes as $index => $lote)
                            <li class="mb-10 ms-8">
                                <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                {{ $lote->id }}
                                </span>
                                <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$lote->descricao}}</h6>
                                <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{$lote->created_at}} - {{$lote->lances()->count() }} lances</time>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 mt-2">
                                    <div class="text-center bg-blue-600 text-xs text-blue font-medium text-blue-100 text-center p-1.5 leading-none" style="width: {{ $lote->valor_prelance_percentual_valor_estimado }}%"> 
                                    </div>
                                </div>
                                <x-layouts.badges.info-percent
                                                            :convert="false"
                                                            :textLength="'sm'"
                                                            :value="$lote->valor_prelance_percentual_valor_estimado"
                                                            />
                                <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mt-2 mb-4 md:mb-5">
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
                                        <small class="flex">
                                            <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$lance->valor"
                                            />
                                        </small>
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
                                        <small class="flex">
                                            <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span><x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$lance->valor"
                                            />
                                        </small>
                                    </li>
                                    @endif
                                    @endforeach                
                                </ol>
                            </li>
                            @endforeach                
                        </ol>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
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

                @livewire('components.app.charts.prelance-lote-valor-atingido', [$leilao])
            </div>
        </div>
        <br>
        <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
            <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
                REGISTRAR NOVO LANCE
            </a>
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
                                        <a class="cursor-pointer" data-modal-target="{{$cliente->uuid}}" data-modal-toggle="{{$cliente->uuid}}">{{ $cliente->nome }}</a>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $cliente->email }}
                                    </p>
                                </div>
                                <x-layouts.modals.simple-modal
                                    :tamanho="4"
                                    :identificador="$cliente->uuid"
                                    :sessao="$cliente->uuid"
                                    :titulo="$cliente->nome">
                                    @section($cliente->uuid)
                                    <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'clienteUuid' => $cliente->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                        </svg>
                                        REGISTRAR NOVO LANCE
                                    </a>
                                        <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach($cliente->lances()->with('lote')->where('lance.leilao_uuid', $leilao->uuid)->groupBy('lance.id', 'lance_cliente.cliente_uuid')->get() as $lance)
                                                <li class="pb-3 sm:pb-4" >
                                                    <div class="flex items-center space-x-4 rtl:space-x-reverse" >
                                                        <div class="flex-shrink-0"> 
                                                            <span class="items-center justify-center w-6 h-6 bg-gray-100 rounded-full start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                                                <svg class="w-6 h-6 {{$lance->uuid === $lance->lote->lance_vencedor()->uuid ? 'text-green-600' : 'text-blue-100'}}  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'loteUuid' => $lance->lote->uuid, 'clienteUuid' => $cliente->uuid])}}"  ><b role="button" >Lote {{$lance->lote->id}}</b></a>
                                                            </p>
                                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{$lance->created_at}}
                                                            </p>
                                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{$lance->lote->descricao}}
                                                            </p>
                                                        </div>
                                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">   
                                                        <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                                            <x-layouts.badges.info-money
                                                                :convert="false"
                                                                :value="$lance->valor"
                                                            ></x-layouts.badges.info-money>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endsection
                                </x-layouts.modals.simple-modal> 
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>