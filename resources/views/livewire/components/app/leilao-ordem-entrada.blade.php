{{--<div class="mb-2 break-inside-auto justify-center w-full">--}}
{{--    <p><b>Ordem de entrada</b></p>--}}
{{--    <ul class="inline-flex" wire:sortable="updateTaskOrder">--}}
{{--        @forelse($lotes as $lote)--}}
{{--            <li wire:sortable.handle class="cursor-pointer" wire:sortable.item="{{ $lote->id }}" wire:key="task-{{ $lote->id }}">--}}
{{--                <div wire:sortable.handle class="relative mr-2 inline-flex items-center justify-center w-14 h-14 overflow-hidden bg-blue-100 rounded-full dark:bg-blue-900">--}}
{{--                    <span class="font-medium text-blue-800 dark:text-blue-200">--}}
{{--                        {{$lote->numero}}--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @empty--}}
{{--            <li>Nenhum lote cadastrado.</li>--}}
{{--        @endforelse--}}
{{--    </ul>--}}
{{--    <br>--}}
{{--</div>--}}


{{--<div class="mb-2 w-full">--}}
{{--    <p class="font-bold mb-2">Ordem de entrada</p>--}}
{{--    <div class="w-full overflow-x-auto pb-2"> <!-- Added overflow container -->--}}
{{--        <ul class="inline-flex flex-nowrap space-x-2 mt-2" wire:sortable="updateTaskOrder">--}}
{{--            @forelse($lotes as $index => $lote)--}}
{{--                <li wire:sortable.handle--}}
{{--                    class="flex-shrink-0 cursor-pointer"--}}
{{--                    wire:sortable.item="{{ $lote->id }}"--}}
{{--                    wire:key="task-{{ $lote->id }}">--}}
{{--                    <div class="relative me-4">--}}
{{--                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">--}}
{{--                            <b>{{$lote->numero}}</b>--}}
{{--                        </div>--}}
{{--                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">--}}
{{--                            {{$index+1}}--}}
{{--                            <div wire:loading>--}}
{{--                                ...--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @empty--}}
{{--                <li>Nenhum lote cadastrado.</li>--}}
{{--            @endforelse--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="mb-2 w-full">
    <p class="font-bold mb-2">Ordem de entrada</p>
    <div class="w-full overflow-x-auto pb-2">
        <ul class="inline-flex flex-nowrap space-x-2 mt-2" wire:sortable="updateTaskOrder">
            <li>
                <a target="_blank" href="{{route('leilao.mapa.ordem-entrada', ['uuid' => $leilao->uuid])}}">
                    <div class="relative me-4">
                        <!-- Main circle -->
                        <div class="border-2 border-purple-500 w-14 h-14 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center transition-colors duration-200">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
            @forelse($lotes as $index => $lote)
                <li wire:sortable.handle
                    class="flex-shrink-0 cursor-move"
                    wire:sortable.item="{{ $lote->id }}"
                    wire:key="task-{{ $lote->id }}">
                    <div class="relative me-2">
                        <!-- Main circle -->
                        <div class="w-14 h-14 bg-{{$lote->status == 0? 'green': 'gray'}}-200 dark:bg-{{$lote->status == 0? 'green': 'gray'}}-900 rounded-full flex items-center justify-center transition-colors duration-200">
                            <b class="text-blue-800 dark:text-blue-200">{{$lote->numero}}</b>
                        </div>

                        <!-- Badge with dark mode support -->
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-blue-500 dark:bg-blue-600 border-2 border-white dark:border-white rounded-full -top-2 -end-2 transition-colors duration-200">
                            {{$index+1}}
                        </div>
                    </div>
                </li>
            @empty
                <li>Nenhum lote cadastrado.</li>
            @endforelse
        </ul>
    </div>
</div>
