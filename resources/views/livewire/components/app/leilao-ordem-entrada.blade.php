<div class="mb-2 w-full">
    <p class="font-bold mb-2">Ordem de entrada</p>
    <div class="w-full overflow-x-auto pb-2 sortable-dropzone">
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
                        <div wire:loading.class="opacity-40" class="border-2 border-green-500 w-14 h-14 bg-{{$lote->status == 0? 'green': 'gray'}}-200 dark:bg-{{$lote->status == 0? 'green': 'gray'}}-900 rounded-full flex items-center justify-center transition-colors duration-200">
                            <b wire:loading.remove class="text-blue-800 dark:text-blue-200">{{$lote->numero}}</b>
                            <div role="status" wire:loading.delay style="display: none;" wire:target="updateTaskOrder">
                                <svg aria-hidden="true" class="inline w-4 h-4 text-white-200 animate-spin dark:text-white-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <!-- Badge with dark mode support -->
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-blue-500 dark:bg-blue-600 border-2 border-blue-600 dark:border-white rounded-full -top-2 -end-2 transition-colors duration-200">
                            <b wire:loading.remove>{{$index+1}}</b>
                            <div role="status" wire:loading.delay style="display: none;" wire:target="updateTaskOrder">
                                <svg aria-hidden="true" class="inline w-4 h-4 text-white-200 animate-spin dark:text-white-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li>Nenhum lote cadastrado.</li>
            @endforelse
        </ul>
    </div>
    <style>
        /* Dragging state */
        .dragging {
            opacity: 0.5;
            transform: scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            background-color: #f3f4f6;
        }

        /* Drop zone highlight when dragging over */
        .sortable-dropzone {
            background-color: #f0fdf4;
            border: 2px dashed #86efac;
        }

        /* Handle/grab cursor */
        .cursor-move {
            cursor: grab;
        }

        .cursor-move:active {
            cursor: grabbing;
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
        }

        .duration-200 {
            transition-duration: 200ms;
        }

        .ease-in-out {
            transition-timing-function: ease-in-out;
        }
    </style>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.hook('element.initialized', (el, component) => {
                if (el.hasAttribute('wire:sortable.item')) {
                    el.addEventListener('dragstart', () => {
                        el.classList.add('dragging');
                    });

                    el.addEventListener('dragend', () => {
                        el.classList.remove('dragging');
                    });
                }
            });

            Livewire.hook('element.updating', (fromEl, toEl, component) => {
                if (fromEl.hasAttribute('wire:sortable.item')) {
                    fromEl.classList.add('sortable-dropzone');
                    setTimeout(() => {
                        fromEl.classList.remove('sortable-dropzone');
                    }, 200);
                }
            });
        });
    </script>
</div>
