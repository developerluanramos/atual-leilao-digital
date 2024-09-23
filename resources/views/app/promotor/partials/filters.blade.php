<form class="mt-2" action="{{ route('promotor.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
