<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Itens do lote</h5>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Descrição"
                        name="item.descricao"
                        model="item.descricao"
                        blur="default"
                        lenght="4/12"
                        :value="$lote->descricao ?? old('descricao')"
                    />
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
                    <x-layouts.inputs.input-normal-select-enum-livewire
                        :data="\App\Enums\GeneroLoteItemEnum::asSelectArray()"
                        label="Gênero"
                        change="default"
                        name="item.genero"
                        model="item.genero"
                        lenght="4/12"
                    />

                    <x-layouts.inputs.input-normal-number-livewire
                        label="Valor Estimado"
                        name="item.valor_estimado"
                        model="item.valor_estimado"
                        blur="default"
                        change="default"
                        lenght="4/12"
                        :value="$lote->valor_estimado ?? old('valor_estimado')"
                    />
                </div>
                <div class="mt-5">
                    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Imagens</h5>
                        </div>
                        <div class="flow-root">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <x-layouts.inputs.input-multiple-files
                                    label=""
                                    name="imagens"
                                    model="imagens"
                                    blur="default"
                                    change="default"
                                    lenght="12/12"
                                    :value="$lote->imagens ?? old('imagens')"
                                />
                                @error('imagens') <span class="error">{{ $message }}</span> @enderror
                                <div wire:loading wire:target="imagens">Carregando...</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2">
                        @foreach ($this->imagens as $index => $imagem)
                            <img class="h-auto max-w-xs pr-3 pt-3" src="{{$imagem->temporaryUrl()}}" alt="image description">
                            <span>
                                <button
                                    wire:click="removeImagem({{$index}})"
                                    type="button"
                                    class="focus:outline-none h-8 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5">
                    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Vídeos</h5>
                        </div>
                        <div class="flow-root">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <x-layouts.inputs.input-normal-text-livewire
                                    label="Descrição"
                                    name="item.video_descricao"
                                    model="item.video_descricao"
                                    blur="default"
                                    lenght="8/12"
                                    :value="$video?->descricao ?? old('descricao')"
                                /> 
                                <x-layouts.inputs.input-normal-text-livewire
                                    label="Youtube URL"
                                    name="item.video_url"
                                    model="item.video_url"
                                    blur="default"
                                    lenght="4/12"
                                    :value="$video?->url ?? old('url')"
                                /> 
                            </div>
                        </div>
                        <button wire:click="addVideo" type="button" class="text-smfont-medium text-blue-600 hover:underline dark:text-blue-500">
                            Adicionar
                        </button>
                        @foreach ($this->videos as $index => $video)
                            <iframe src="{{$video['url']}}"
                                loading="lazy"
                                width="350"
                                height="210"
                                class="pr-3 pt-3"
                                frameborder="0"
                                allow="accelerometer; autoplay;
                                encrypted-media; gyroscope;
                                picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <span>
                                <button
                                    wire:click="removeVideo({{$index}})"
                                    type="button"
                                    class="focus:outline-none h-8 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="mb-12">
                    <button type="button" wire:click="add" class="float-end mt-4 px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Adicionar Item
                    </button>
                </div>
                @if($errorMessage !== '')
                    <div class="flex flex-wrap -mx-3 mb-2 ml-1">
                       <small class="text-red-900">{{$errorMessage}}</small>
                    </div>
                @endif
            </li>
            @forelse($itens as $index => $item)
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$item['descricao']}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <small>Gênero: </small> {{ \App\Enums\GeneroLoteItemEnum::getDescription((int)$item['genero']) }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <small>Espécie: </small> {{$item['especie_uuid']}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <small>Raça: </small> {{$item['raca_uuid']}}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    <small>Valor estimado: </small> <x-layouts.badges.info-money
                                        textLength="sm"
                                        :value="$item['valor_estimado']"
                                    />
                                </p>
                                <p>{{count($item['videos'])}} Videos</p>
                                <p>{{count($item['imagens'])}} Imagens</p>
                            </div>
                            <div class="items-center truncate text-base font-semibold text-gray-900 dark:text-white">
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
                </div>
            @empty
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    Nenhum registro adicionado até o momento, <b>preencha o formulário</b> e clique em <b>adicionar</b> para incluir itens no lote
                </div>
            @endforelse
            <h3 class="text-right text-blue-900">
                <small>Machos: <b>{{$this->quantidadeMacho}}</b></small>
                <small>Fêmeas: <b>{{$this->quantidadeFemea}}</b></small>
                <small>Outros: <b>{{$this->quantidadeOutro}}</b></small>
                <b>
                    <x-layouts.badges.info-money
                        textLength="lg"
                        :value="$this->valorTotal"
                    />
                </b>
            </h3>
        </ul>
        <input type="hidden" name="lote_itens" value="{{json_encode($itens)}}">
    </div>
</div>
