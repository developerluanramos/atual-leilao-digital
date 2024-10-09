@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Especie"
        name="nome"
        lenght="8/12"
        :value="$cliente->nome ?? old('nome')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Descrição"
        name="descricao"
        lenght="8/12"
        :value="$cliente->descricao ?? old('descricao')"
    />
</div>

<x-layouts.buttons.submit-button text="Salvar"/>
