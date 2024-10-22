<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Adicionar Propriedades</h5>
    </div>
    <div class="flow-root">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Nome"
                        name="propriedade.nome"
                        model="propriedade.nome"
                        blur="default"
                        lenght="4/12"
                        :value="$propriedade->nome ?? old('nome')"
                    />
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Município/Localidade"
                        name="propriedade.municipio_localidade"
                        model="propriedade.municipio_localidade"
                        blur="default"
                        lenght="4/12"
                        :value="$propriedade->municipio_localidade ?? old('municipio_localidade')"
                    />
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Logradouro"
                        name="propriedade.logradouro"
                        model="propriedade.logradouro"
                        blur="default"
                        lenght="4/12"
                        :value="$propriedade->logradouro ?? old('logradouro')"
                    />
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-text-livewire
                        label="CEP"
                        name="propriedade.cep"
                        model="propriedade.cep"
                        blur="default"
                        lenght="4/12"
                        :value="$propriedade->cep ?? old('cep')"
                    />
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Número"
                        name="propriedade.numero"
                        model="propriedade.numero"
                        blur="default"
                        lenght="4/12"
                        :value="$propriedade->numero ?? old('numero')"
                    />
                </div>
            </li>
        </ul>
    </div>
</div>
