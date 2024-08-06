<form class="mt-2" action="{{ route('leilao.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
