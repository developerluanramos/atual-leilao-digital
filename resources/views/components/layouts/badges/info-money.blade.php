
@if(isset($outline) && $outline === true) 
    <span class="bg-{{$color ?? 'blue'}}-100 text-{{$color ?? 'blue'}}-800 text-{{$textLength ?? 'sm'}} font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-{{$color ?? 'blue'}}-400 border border-{{$color ?? 'blue'}}-400">
        {{Akaunting\Money\Money::BRL($value ?? 0, $convert ?? true)}}
    </span>
@else
<span
    class="bg-{{$color ?? 'blue'}}-100 text-{{$color ?? 'blue'}}-800 text-{{$textLength ?? 'sm'}} font-medium px-2.5 py-0.5 rounded dark:bg-{{$color ?? 'blue'}}-900 dark:text-{{$color ?? 'blue'}}-300">
    {{Akaunting\Money\Money::BRL($value ?? 0, $convert ?? true)}}
</span>
@endif