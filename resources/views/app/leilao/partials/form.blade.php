@csrf
<div class="flex flex-wrap -mx-3 mb-4">
    <x-layouts.inputs.input-normal-text
        label="Descrição"
        name="descricao"
        lenght="6/12"
        :value="$leilao->descricao ?? old('descricao') ?? null"
    />
    <x-layouts.inputs.input-normal-text
        label="Denominação"
        name="denominacao"
        lenght="6/12"
        :value="$leilao->denominacao ?? old('denominacao') ?? null"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-4">
    <x-layouts.inputs.input-normal-text
        label="Local"
        name="local"
        lenght="6/12"
        :value="$leilao->local ?? old('local') ?? null"
    />
    <x-layouts.inputs.input-date
        label="Data de abertura"
        name="data_abertura"
        lenght="3/12"
        :value="$leilao->data_abertura ?? old('data_abertura') ?? null"
    />
    <x-layouts.inputs.input-date
        label="Data de fechamento"
        name="data_fechamento"
        lenght="3/12"
        :value="$leilao->data_fechamento ?? old('data_fechamento') ?? null"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-4">
    <x-layouts.inputs.input-normal-text
        label="CEP"
        name="cep"
        lenght="3/12"
        :value="$leilao->cep ?? old('cep') ?? null"
    />
    <x-layouts.inputs.input-normal-text
        label="UF"
        name="uf"
        lenght="3/12"
        :value="$leilao->uf ?? old('uf') ?? null"
    />
    <x-layouts.inputs.input-normal-text
        label="Cidade"
        name="cidade"
        lenght="6/12"
        :value="$leilao->cidade ?? old('cidade') ?? null"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-4">
    <x-layouts.inputs.input-normal-select
        label="Leiloeiro"
        name="leiloeiro_uuid"
        lenght="6/12"
        :Data="$formData['leiloeiros']"
        :value="$leilao->leiloeiro_uuid ?? old('leiloeiro_uuid') ?? null"
    />
    <x-layouts.inputs.input-normal-select
        label="promotor"
        name="promotor_uuid"
        lenght="6/12"
        :Data="$formData['promotores']"
        :value="$leilao->promotor_uuid ?? old('promotor_uuid') ?? null"
    />
</div>

<b class="uppercase mb-2">Configuração Pré-lances</b>
@livewire('components.app.leilao-config-pre-lance', [$formData])
<br><br>

