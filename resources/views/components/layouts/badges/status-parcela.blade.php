@if ($status == App\Enums\StatusParcelaEnum::FECHADO)
    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
        {{App\Enums\StatusParcelaEnum::getKey($status)}}
    </span>
@elseif ($status == App\Enums\StatusParcelaEnum::ABERTO)
    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
        {{App\Enums\StatusParcelaEnum::getKey($status)}}
    </span>
@endif