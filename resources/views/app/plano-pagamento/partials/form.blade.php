@csrf

<div class="flex flex-wrap -mx-3 mb-4">
    <x-layouts.inputs.input-normal-text
        label="Nome"
        name="nome"
        lenght="4/12"
        :value="$plano_pagamento->nome ?? old('nome')"
    />
    <x-layouts.inputs.input-normal-text
        label="Descrição"
        name="nome"
        lenght="4/12"
        :value="$plano_pagamento->descricao ?? old('descricao')"
    />
</div>

@livewire('components.app.plano-pagamento-condicoes-pagamento')

<x-layouts.buttons.submit-button text="Salvar"/>
