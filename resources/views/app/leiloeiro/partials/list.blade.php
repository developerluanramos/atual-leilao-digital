<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Data de nascimento'
    ]"
    :paginator="$leiloeiros"
    :appends="$filters"
>
    @section('table-content')
        @foreach($leiloeiros->items() as $index => $leiloeiro)
            <tr>
                <td>{{ $leiloeiro->nome }}</td>
                <td>{{ $leiloeiro->email }}</td>
                <td>{{ $leiloeiro->nascido_em }}</td>
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
                    :route="route('cargo.edit', $leiloeiro->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
