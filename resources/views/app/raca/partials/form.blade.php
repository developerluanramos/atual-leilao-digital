@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Raça"
        name="nome"
        lenght="8/12"
        :value="$raca->nome ?? old('nome')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Descrição"
        name="nome"
        lenght="8/12"
        :value="$raca->descricao ?? old('descricao')"
    />
</div>
<x-layouts.buttons.submit-button text="Salvar"/>
