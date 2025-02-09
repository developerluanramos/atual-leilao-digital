<div>
    @if ($valorLote <= $lote->valor_estimado)
        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{$this->percentualValorTotal}}%"> 
                {{round($this->percentualValorTotal, 2)}}%
            </div>
        </div>
    @else
        <div class="w-full bg-yellow-200 rounded-full dark:bg-yellow-700">
            <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{$this->percentualValorEstimado}}%"> 
                100%
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
            <small>Excedente: </small> <x-layouts.badges.info-percent
                :value="$this->percentualValorExcedente"
            /> | 
            <small></small> <x-layouts.badges.info-money
                :value="$this->valorExcedente"
            />
        </p>
    @endif
</div>
