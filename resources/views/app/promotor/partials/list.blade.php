<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Data de Nascimento'
    ]"
    :paginator="$promotores"
    :appends="$filters"
>
    @section('table-content')
        @foreach($promotores->items() as $index => $promotor)
            <tr>
                <td>{{ $promotor->nome }}</td>
                <td>{{ $promotor->email }}</td>
                <td>{{ $promotor->nascido_em }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $promotor->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('pisteiro.edit', $promotor->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('pisteiro.delete', [
                        'uuid' => $promotor->uuid
                    ])"
                />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
