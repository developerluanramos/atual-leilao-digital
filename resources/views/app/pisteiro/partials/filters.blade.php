<form class="mt-2" action="{{ route('cargo.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
