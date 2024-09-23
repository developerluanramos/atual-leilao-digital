<form class="mt-2" action="{{ route('especie.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
