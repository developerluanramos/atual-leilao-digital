<div class="mt-4">
    <div class="flex flex-wrap -mx-3 mb-4">
        <x-layouts.inputs.input-date-livewire
            label="Data de abertura"
            model="dataAbertura"
            name="dataAbertura"
            lenght="3/12"
            change="default"
            blur="default"
            :value="$leilao->dataAbertura ?? old('dataAbertura') ?? null"
        />
        <x-layouts.inputs.input-date-livewire
            label="Data de fechamento"
            model="dataFechamento"
            name="dataFechamento"
            change="default"
            blur="default"
            lenght="3/12"
            :value="$leilao->dataFechamento ?? old('dataFechamento') ?? null"
        />
    </div>
{{--    <div class="flex flex-wrap -mx-3 mb-4">--}}
{{--        {{$this->dataAbertura}}<br>--}}
{{--        {{$this->dataFechamento}}<br>--}}
{{--        {{$this->diffInDays}}--}}
{{--        {{json_encode($this->configs)}}--}}
{{--    </div>--}}

    @if($this->diffInDays > 0)
        <div class="flex flex-wrap -mx-3 mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="text-center">Data</th>
                    <th class="text-center">Plano de pagamento</th>
                    <th class="text-center">Cor</th>
                    <th class="text-right">Valor estimado</th>
                    <th class="text-right">Valor mínimo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->configs as $key => $config)
                    <tr>
                        <td class="text-center">
                            <x-layouts.inputs.input-date-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.data' }}"
                                name="dataAbertura"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$leilao->dataAbertura ?? old('dataAbertura') ?? null"
                            />
                        </td>
                        <td class="text-center">
                            <x-layouts.inputs.input-normal-select-livewire
                                label=""
                                name="plano_pagamento_uuid"
                                lenght="12/12"
                                model="{{ 'configs.'.$key.'.plano_pagamento_uuid' }}"
                                :data="$this->formData['planos_pagamento']"
                                change="default"
                                blur="default"
                            />
                        </td>
                        <td class="text-center">
                            <x-layouts.inputs.input-colorpicker-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.cor' }}"
                                name="dataAbertura"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$leilao->dataAbertura ?? old('dataAbertura') ?? null"
                            />
                        </td>
                        <td class="text-right">
                            <x-layouts.inputs.input-normal-text-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.valor_estimado' }}"
                                name="valor_estimado"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$leilao->valor_estimado ?? old('valor_estimado') ?? null"
                            />
                        </td>
                        <td class="text-right">
                            <x-layouts.inputs.input-normal-text-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.valor_minimo' }}"
                                name="valor_minimo"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$leilao->valor_minimo ?? old('valor_minimo') ?? null"
                            />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
