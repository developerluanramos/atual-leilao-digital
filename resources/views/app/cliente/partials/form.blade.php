@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Nome"
        name="nome"
        lenght="6/12"
        :value="$cliente->nome ?? old('nome')"
    />
    <x-layouts.inputs.input-normal-text
        label="CPF/CNPJ"
        name="cpf_cnpj"
        lenght="4/12"
        :value="$cliente->cpf_cnpj ?? old('cpf_cnpj')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Endereço"
        name="endereco"
        lenght="6/12"
        :value="$cliente->endereco ?? old('endereco')"
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
        label="Cidade"
        name="cidade"
        lenght="4/12"
        :value="$cliente->cidade ?? old('cidade')"
    />
    <x-layouts.inputs.input-normal-text
        label="UF"
        name="uf"
        lenght="3/12"
        :value="$cliente->uf ?? old('uf')"
    />
    <x-layouts.inputs.input-normal-text
        label="Número de celular"
        name="numero"
        lenght="3/12"
        :value="$cliente->numero ?? old('numero')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Complemento"
        name="complemento"
        lenght="6/12"
        :value="$cliente->complemento ?? old('complemento')"
    />
    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="4/12"
        :value="$cliente->email ?? old('email')"
    />
</div>
<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Site"
        name="site"
        lenght="4/12"
        :value="$cliente->site ?? old('site')"
    />
</div>

<x-layouts.buttons.submit-button text="Salvar"/>
