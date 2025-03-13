<div class="mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(is_null($leilao->plano_pagamento_prelance))
        <p>Nenhum plano de pagamento encontrado para esta data no pré-lance</p>
        @php die; @endphp
    @else
        <div class="mb-3">
            <ul class="flex flex-wrap items-center justify-center text-gray-900 dark:text-white">
                @foreach($leilao->config_prelance()->get() as $config)
                    <li class="text-center content-center items-center">
                        <a href="#" class="me-4 {{$leilao->config_prelance_atual->uuid == $config->uuid ? 'underline' : ''}} md:me-6 ">
                            <span style="background-color: {{ $config->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                            {{ $config->data }}
                        </a>
                    </li>
                    {{-- <div style="{{$leilao->config_prelance_atual->uuid == $config->uuid ? 'background-color: #1c9b17' : '#ccc'}}" class="flex cursor-pointer items-center flex-col p-4 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        <h5>
                            
                        </h5>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $config->data }}
                        </h5>
                    </div> --}}
                @endforeach
            </ul>
        </div>
        <div class="p-4 mb-2 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
            <small>Plano Pagamento: <b>{{ $leilao->plano_pagamento_prelance->descricao }}</b></small>
            <ul>
                @foreach($leilao->plano_pagamento_prelance->condicoes_pagamento()->get() as $condicaoPagamento)
                    <li>
                        <p>
                            <small>Parcelas: <b>{{$condicaoPagamento['qtd_parcelas']}}</b></small> |
                            <small>Repetições: <b>{{$condicaoPagamento['repeticoes']}}</b></small>
                            {{-- <small>Comissão Venda: <b>{{$condicaoPagamento['percentual_comissao_vendedor']}} %</b></small> |
                            <small>Comissão Compra: <b>{{$condicaoPagamento['percentual_comissao_comprador']}} %</b></small> --}}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($this->lote->uuid))
    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
        <h2 id="accordion-collapse-heading-2">
            <button wire:click="handleTab()" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <span>Lote {{$this->lote->numero}} - {{$this->lote->descricao}} </span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="{{$hidden}}" aria-labelledby="accordion-collapse-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
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
        <small wire:click="removerLote()" class="cursor-pointer text-blue-800">escolher outro lote</small>
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
                    :value="$lote->lance_vencedor()?->valor ?? 0" /></p>
            </div>
        @endforeach
    </div>
    @endif
    <br>

    @if(!empty($lote))
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="text"
                wire:model.live.debounce.1000ms="searchClientes"
                id="searchClientes"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pesquisar clientes"
                name="searchClientes">
        </div>
        <div wire:loading>
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    @endif
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
                wire:model.live.debounce.1000ms="valorLance"
                name="valorLance"
                id="valorLance"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
            @if ($this->lote->valor_prelance_calculado > $this->valorLance)
                <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                    Valor do lance precisa ser maior que o valor de progressão
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
            @endif
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Parcelas</p>
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <h1 class="text-5xl">{{count($parcelas)}}</h1>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Compradores</p>
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <h1 class="text-5xl">{{$this->quantidadeCompradores}}</h1>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Comprador</p>
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <p>
                    <x-layouts.badges.info-money
                        :value="$this->valorTotalComissaoComprador"
                        :textLength="'lg'"
                    />
                </p>
            </div>
        </div>
        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Comissão Vendedor</p>
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <p>
                    <x-layouts.badges.info-money
                        :textLength="'lg'"
                        :value="$this->valorTotalComissaoVendedor"
                    />
                </p>
            </div>
        </div>

        <div class="w-full md:w-2/12 md:mb-0 px-3 text-center">
            <div class="max-w-sm p-2 bg-blue-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">Total Lote</p>
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
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
    @if(!empty($compradores)  && !empty($this->lote))
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
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
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
                                    <x-layouts.badges.sim-nao
                                        :status="$parcela['incide_comissao_compra']"
                                    />
                                    <x-layouts.badges.info-money
                                        :value="$parcela['valor_comissao_comprador']"
                                    />
                                </td>
                                <td class="text-right">
                                    <x-layouts.badges.info-percent
                                        :value="$parcela['percentual_comissao_vendedor']"
                                    />
                                    <x-layouts.badges.sim-nao
                                        :status="$parcela['incide_comissao_venda']"
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
            </div>
        @empty
    {{--    <p>Nenhum comprador adicionado até o momento</p>--}}
        @endforelse
    @endif

    @if(!empty($compradores)  && !empty($this->lote))
        @if ($this->lote->valor_prelance_calculado > $this->valorLance)
            <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                Valor do lance precisa ser maior que o valor de progressão
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        @else
            <button
                wire:click="registrar"
                type="button"
                class="w-full h-10 mt-6 mb-10 px-3 py-1 text-xs font-medium text-center content-center items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                data-te-ripple-color="light">
                <svg wire:loading aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                CONFIRMAR PRÉ-LANCE
            </button>
        @endif
    @endif
</div>
