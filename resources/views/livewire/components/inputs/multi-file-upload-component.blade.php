<div class="w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Upload de Arquivos</h2>

    <div class="border-2 border-dashed border-gray-300 p-6 rounded-lg text-center">
        <input type="file" wire:model="files" multiple class="hidden" id="fileInput">
        
        <label for="fileInput" class="cursor-pointer flex flex-col items-center space-y-2">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7 16l-4-4m0 0l4-4m-4 4h16m-5 4l4-4m0 0l-4-4m4 4H3"></path>
            </svg>
            <span class="text-gray-600">Clique para selecionar arquivos</span>
        </label>
    </div>

    @error('files')
        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
    @enderror

    @if (session()->has('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    {{-- Lista de arquivos selecionados --}}
    @if (count($files))
        <div class="mt-4">
            <h3 class="text-sm font-semibold text-gray-600">Arquivos Selecionados:</h3>
            <ul class="mt-2 space-y-1">
                @foreach($files as $file)
                    <li class="text-gray-700 text-sm flex justify-between items-center">
                        <span>{{ $file->getClientOriginalName() }}</span>
                        <span class="text-xs text-gray-500">({{ round($file->getSize() / 1024, 2) }} KB)</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Lista de arquivos já enviados --}}
    <div class="mt-6">
        <h3 class="text-sm font-semibold text-gray-600">Arquivos Enviados:</h3>
        <ul class="mt-2 space-y-1">
            @foreach($uploadedFiles as $uploadedFile)
                <li class="text-sm flex justify-between items-center">
                    <a href="{{ asset('storage/' . $uploadedFile->file_path) }}" target="_blank"
                       class="text-blue-600 hover:underline">
                        {{ basename($uploadedFile->file_path) }}
                    </a>

                    {{-- Botão de excluir --}}
                    <button wire:click="deleteFile({{ $uploadedFile->id }})"
                            class="text-red-600 hover:text-red-800 text-xs ml-2">
                        Excluir
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <button wire:click="uploadFiles"
            class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed"
            @if(empty($files)) disabled @endif>
        Enviar Arquivos
    </button>
</div>
