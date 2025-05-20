<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Vendedores</h5>
    </div>
    <div>
        <label for="default-textoBuscaVendedor" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar vendedor</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="text"
                wire:model.live.debounce.1000ms="textoBuscaVendedor"
                id="textoBuscaVendedor"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pesquisar vendedor"
                name="textoBuscaVendedor">
        </div>
        <div wire:loading style="display: none" >
            Processando...
        </div>
        <br>
        @if(!empty($textoBuscaVendedor) && !empty($resultadoBuscaVendedor))
            <ul class="">
                @foreach($resultadoBuscaVendedor as $result)
                    <li class="pb-3 sm:pb-4" wire:click="addVendedor({{json_encode($result)}})">
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
        @forelse($vendedores as $index => $vendedor)
            <div class="mt-2">
                <p>
                    <b>{{$vendedor['nome']}} <span class="text-blue-400">({{$vendedor['percentual_cota']}}%)</span></b>
                <p>
                    <small>
                        {{$vendedor['email']}}
                    </small>
                    <button
                        wire:click="removerVendedor({{$index}})"
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
                        {{$vendedor['endereco']}}
                    </small>
                </p>
                <p>
                    <div class="relative mb-6">
                        <label for="labels-range-input" class="sr-only"></label>
                        <input wire:model.live="{{'vendedores.'.$index.'.percentual_cota'}}" id="labels-range-input" type="range" value="{{$vendedor['percentual_cota']}}" min="1" max="100" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min (1%)</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max (100%)</span>
                    </div>
                </p>
            </div>
        @empty
            <p>Nenhum vendedor adicionado até o momento</p>
        @endforelse
    </div>
    <input type="hidden" name="lote_vendedores" value="{{json_encode($vendedores)}}">
</div>
