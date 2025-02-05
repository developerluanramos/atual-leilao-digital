<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        ''
    ]"
    :paginator="$leiloeiros"
    :appends="$filters"
>
    @section('table-content')
        @foreach($leiloeiros->items() as $index => $leiloeiro)
            <tr>
                <td>{{ $leiloeiro->nome }}</td>
                <td>{{ $leiloeiro->email }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $leiloeiro->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('leiloeiro.edit', $leiloeiro->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('leiloeiro.delete', [
                        'uuid' => $leiloeiro->uuid
                    ])"
                />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
