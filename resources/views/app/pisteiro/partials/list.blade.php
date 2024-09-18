<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Data de Nascimento'
    ]"
    :paginator="$pisteiros"
    :appends="$filters"
>
    @section('table-content')
        @foreach($pisteiros->items() as $index => $pisteiro)
            <tr>
                <td>{{ $pisteiro->nome }}</td>
                <td>{{ $pisteiro->email }}</td>
                <td>{{ $pisteiro->nascido_em }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $pisteiro->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('pisteiro.edit', $pisteiro->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('pisteiro.delete', [
                        'uuid' => $pisteiro->uuid
                    ])"
                />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
