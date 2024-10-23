<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Adicionar Contatos</h5>
    </div>
    <div class="flow-root">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex flex-wrap -mx-3 mb-2">
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Nome"
                        name="contato.nome"
                        model="contato.nome"
                        blur="default"
                        lenght="4/12"
                        :value="$contato->nome ?? old('nome')"
                    />
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Contato"
                        name="contato.valor"
                        model="contato.valor"
                        blur="default"
                        lenght="4/12"
                        :value="$contato->valor ?? old('valor')"
                    />
                    <x-layouts.inputs.input-normal-text-livewire
                        label="Descrição"
                        name="contato.descricao"
                        model="contato.descricao"
                        blur="default"
                        lenght="4/12"
                        :value="$contato->descricao ?? old('descricao')"
                    />
                </div>
            </li>
        </ul>
    </div>
</div>
