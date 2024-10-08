<div class="mt-4">
    <div class="flex flex-wrap -mx-3 mb-4">
        <x-layouts.inputs.input-date-livewire
            label="Data de abertura"
            model="prelance_aberto_em"
            name="prelance_aberto_em"
            lenght="3/12"
            change="default"
            blur="default"
            :value="$leilao->prelance_aberto_em ?? old('prelance_aberto_em') ?? null"
        />
        <x-layouts.inputs.input-date-livewire
            label="Data de fechamento"
            model="prelance_fechado_em"
            name="prelance_fechado_em"
            change="default"
            blur="default"
            lenght="3/12"
            :value="$leilao->prelance_fechado_em ?? old('prelance_fechado_em') ?? null"
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
                    <th class="text-center">Valor estimado</th>
                    <th class="text-center">Valor mínimo</th>
                    <th class="text-center">Valor Progressão</th>
                    <th class="text-center">Percentual Progressão</th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->configs as $key => $config)
                    <tr>
                        <td class="text-center">
                            <x-layouts.inputs.input-date-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.data' }}"
                                name="data"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$this->data ?? old('data') ?? null"
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
                                name="cor"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$this->cor ?? old('cor') ?? null"
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
                                :value="$this->valor_estimado ?? old('valor_estimado') ?? null"
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
                                :value="$this->valor_minimo ?? old('valor_minimo') ?? null"
                            />
                        </td>
                        <td class="text-right">
                            <x-layouts.inputs.input-normal-text-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.valor_progressao' }}"
                                name="valor_progressao"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$this->valor_progressao ?? old('valor_progressao') ?? null"
                            />
                        </td>
                        <td class="text-right">
                            <x-layouts.inputs.input-normal-text-livewire
                                label=""
                                model="{{ 'configs.'.$key.'.percentual_progressao' }}"
                                name="percentual_progressao"
                                lenght="12/12"
                                change="default"
                                blur="default"
                                :value="$this->percentual_progressao ?? old('percentual_progressao') ?? null"
                            />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <input type="hidden" name="configPreLance" value="{{json_encode($this->configs)}}">
    @endif
</div>
