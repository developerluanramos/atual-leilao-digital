<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Descrição'
    ]"
    :paginator="$especies"
    :appends="$filters"
>
    @section('table-content')
        @foreach($especies->items() as $index => $especie)
            <tr>
                <td>{{ $especie->nome }}</td>
                <td>{{ $especie->descricao }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $especie->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('cargo.edit', $especie->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
