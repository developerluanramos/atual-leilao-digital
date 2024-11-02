@section('title', 'Visualiza Lote')

<x-layouts.badges.status-lote 
    :status="(int)$lote->status">
</x-layouts.badges.status-lote>

    
        
<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Compras</h5>
</div>
<div class="flow-root">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($lote->compras as $compra)
            <li class="py-3 sm:py-4">
                <div class="flex items-center w-full">
                    <div class="flex-shrink-0">
                        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($compra->cliente->nome, 0, 2)}}</span>
                        </div>
                        </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{$compra->cliente->nome}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$compra->created_at}}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <x-layouts.badges.info-money
                            :convert="false"
                            :value="$compra->valor"
                        ></x-layouts.badges.info-money>
                    </div>
                </div>
            </li>
        @empty
            <small class="color-red">nenhuma compra registrada neste lote</small>
        @endforelse
    </ul>
</div>
  
{{-- @dump($lote) --}}