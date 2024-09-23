@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Pisteiro"
        name="nome"
        lenght="8/12"
        :value="$pisteiro->nome ?? old('nome')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="8/12"
        :value="$pisteiro->email ?? old('email')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-date
        label="Data de Nascimento"
        name="nascido_em"
        lenght="8/12"
        :value="$pisteiro->nascido_em ?? old('nascido_em')"
    />
</div>
    
<x-layouts.buttons.submit-button text="Salvar"/>
