@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Leiloeiro"
        name="nome"
        lenght="8/12"
        :value="$leiloeiro->nome ?? old('nome')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="8/12"
        :value="$leiloeiro->email ?? old('email')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Data de Nascimento"
        name="nascido_em"
        lenght="8/12"
        :value="$leiloeiro->nascido_em ?? old('nascido_em')"
    />
</div>
<x-layouts.buttons.submit-button text="Salvar"/>
