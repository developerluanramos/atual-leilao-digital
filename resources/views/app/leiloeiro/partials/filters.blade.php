<form class="mt-2" action="{{ route('leiloeiro.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
