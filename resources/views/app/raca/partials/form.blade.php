@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Cargo"
        name="nome"
        lenght="8/12"
        :value="$cargo->nome ?? old('nome')"
    />
</div>
    <x-layouts.inputs.input-switch
        label="Situação"
        name="situacao"
        :value="$cargo->situacao ?? old('situacao')"
/>
@livewire('components.select-boxes.estrutura-organizacional', [
    'components' => ['postos_trabalho', 'setores', 'departamentos'],
//    'postoTrabalhoUuid' => '1c2b68b1-4e55-3bb8-be47-77286a2a2a91',
//    'setorUuid' => '50da5a86-3084-304e-9b6e-12b601ac4e7c',
//    'departamentoUuid' => '76edaf22-2b49-37f0-983c-7bdda8db3d32'
])
<x-layouts.buttons.submit-button text="Salvar"/>
