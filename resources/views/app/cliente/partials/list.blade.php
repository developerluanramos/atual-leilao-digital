<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Documento',
        'Endereço'
        // 'Ações'
    ]"
    :paginator="$clientes"
    :appends="$filters"
>
    @section('table-content')
        @foreach($clientes->items() as $index => $cliente)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->cpf_cnpj }}</td>
                <td>{{ $cliente->endereco }}</td>
                {{-- <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $cliente->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('plano-pagamento.edit', $cliente->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('plano-pagamento.delete', [
                        'uuid' => $cliente->uuid
                    ])"
                />
                </td> --}}
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
