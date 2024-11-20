<div>
    <p>
        Porcentagem do valor estimado atingida
    </p>
    @if ($lote->valor_total < $lote->valor_estimado)
        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{($lote->valor_total * 100/$lote->valor_estimado)}}%"> 
                {{round($lote->valor_total * 100/$lote->valor_estimado, 2)}}%
            </div>
        </div>
    @else
        <div class="w-full bg-yellow-200 rounded-full dark:bg-yellow-700">
            <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{(($lote->valor_estimado) * 100/$lote->valor_total)}}%"> 
                100%
            </div>
        </div>
        <p class="text-sm font-medium text-gray-500 truncate dark:text-gray">
            <small>Excedente: </small> <x-layouts.badges.info-percent
                :value="($lote->valor_total * 100/$lote->valor_estimado) - 100"
            /> | 
            <small></small> <x-layouts.badges.info-money
                :value="$lote->valor_total - $lote->valor_estimado"
            />
        </p>
    @endif
</div>
