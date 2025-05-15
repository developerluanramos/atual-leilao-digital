<div class="mb-2">
    <p><b>Ordem de entrada</b></p>
    <ul class="inline-flex" wire:sortable="updateTaskOrder">
        @foreach ($lotes as $lote)
            <li class="cursor-pointer" wire:sortable.item="{{ $lote->id }}" wire:key="task-{{ $lote->id }}">
                <div class="relative mr-2 inline-flex items-center justify-center w-12 h-12 overflow-hidden bg-blue-100 rounded-full dark:bg-blue-900">
                    <span class="font-medium text-blue-800 dark:text-blue-200">
                        {{$lote->numero}}
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
    <br>
</div>
