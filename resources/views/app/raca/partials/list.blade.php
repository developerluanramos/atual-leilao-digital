<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Descrição'
    ]"
    :paginator="$racas"
    :appends="$filters"
>
    @section('table-content')
        @foreach($racas->items() as $index => $raca)
            <tr>
                <td>{{ $raca->nome }}</td>
                <td>{{ $raca->descricao }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $raca->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('raca.edit', $raca->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('raca.delete', [
                        'uuid' => $raca->uuid
                    ])"
                />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
