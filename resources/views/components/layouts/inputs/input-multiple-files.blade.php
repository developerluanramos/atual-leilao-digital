<div class="w-full md:w-{{$lenght}} px-3 mb-6 md:mb-0">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">
        {{$label}}
    </label>
    <input wire:model="{{$model}}" wire:blur="{{$blur}}" name="{{$name}}" id="{{$name}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
    @error($name)
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>