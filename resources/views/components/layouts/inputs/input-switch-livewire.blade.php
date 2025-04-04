<div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="incide_comissao_compra">
        {{$label}}
    </label>
    <label class="inline-flex items-center me-5 cursor-pointer">
        <input wire:model.live="{{$model}}" name="{{$name}}" type="checkbox" value="{{$value}}" class="sr-only peer" checked="">
        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
    </label>
</div>