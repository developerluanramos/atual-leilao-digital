<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Itens do lote</h5>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-4/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                            Descrição
                        </label>
                        <input wire:model="item.descricao" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                    </div>
                    <x-layouts.inputs.input-normal-select-livewire
                        :data="$formData['especies']"
                        label="Espécie"
                        name="item.especie_uuid"
                        model="item.especie_uuid"
                        change="default"
                        lenght="4/12"
                        :value="$lote->especie_uuid ?? old('especie_uuid')"
                    />
                    <x-layouts.inputs.input-normal-select-livewire
                        :data="$formData['racas']"
                        label="Raça"
                        change="default"
                        name="item.raca_uuid"
                        model="item.raca_uuid"
                        lenght="4/12"
                        :value="$lote->raca_uuid ?? old('raca_uuid')"
                    />
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                            Quantidade total
                        </label>
                        <input wire:model="item.quantidade" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number">
                    </div>
                    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                            Quantidade machos
                        </label>
                        <input wire:model="item.quantidade_macho" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number">
                    </div>
                    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                            Quantidade fêmeas
                        </label>
                        <input wire:model="item.quantidade_femea" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number">
                    </div>
                    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-city">
                            Quantidade outros
                        </label>
                        <input wire:model="item.quantidade_outros" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2 ml-1">
                    <button wire:click="add" type="button" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        Adicionar
                    </button>
                </div>
                @if($errorMessage !== '')
                    <div class="flex flex-wrap -mx-3 mb-2 ml-1">
                       <small class="text-red-900">{{$errorMessage}}</small>
                    </div>
                @endif
            </li>
            @foreach($itens as $index => $item)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$item['descricao']}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <small>Espécie: </small> {{$item['especie_uuid']}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <small>Raça: </small> {{$item['raca_uuid']}}
                            </p>
                        </div>
                        <div class="items-center truncate text-base font-semibold text-gray-900 dark:text-white">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <button
                                    wire:click="remove({{$index}})"
                                    type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <input type="hidden" name="lote_itens" value="{{json_encode($itens)}}">
    </div>
</div>
