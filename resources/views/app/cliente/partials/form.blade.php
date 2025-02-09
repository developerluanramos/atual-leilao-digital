@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Nome"
        name="nome"
        lenght="4/12"
        :value="$cliente->nome ?? old('nome')"
    />
    <x-layouts.inputs.input-normal-text
        label="CPF/CNPJ"
        name="cpf_cnpj"
        lenght="4/12"
        :value="$cliente->cpf_cnpj ?? old('cpf_cnpj')"
    />
    <x-layouts.inputs.input-normal-text
        label="CEP"
        name="cep"
        lenght="4/12"
        :value="$cliente->cep ?? old('cep')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Endereço"
        name="endereco"
        lenght="4/12"
        :value="$cliente->endereco ?? old('endereco')"
    />
    <x-layouts.inputs.input-normal-text
        label="Número"
        name="numero"
        lenght="2/12"
        :value="$cliente->numero ?? old('numero')"
    />
    <x-layouts.inputs.input-normal-text
        label="UF"
        name="uf"
        lenght="2/12"
        :value="$cliente->uf ?? old('uf')"
    />
    <x-layouts.inputs.input-normal-text
        label="Cidade"
        name="cidade"
        lenght="4/12"
        :value="$cliente->cidade ?? old('cidade')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Complemento"
        name="complemento"
        lenght="4/12"
        :value="$cliente->complemento ?? old('complemento')"
    />
    <x-layouts.inputs.input-normal-text
        label="Celular"
        name="celular"
        lenght="2/12"
        :value="$cliente->celular ?? old('celular')"
    />
    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="3/12"
        :value="$cliente->email ?? old('email')"
    />
    <x-layouts.inputs.input-normal-text
        label="Site"
        name="site"
        lenght="3/12"
        :value="$cliente->site ?? old('site')"
    />
</div>
{{-- 
@livewire('components.app.cliente-propriedades', [$propriedades])
@livewire('components.app.cliente-contatos', [$contatos]) --}}

<x-layouts.buttons.submit-button text="Salvar"/>
