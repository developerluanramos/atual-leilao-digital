<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Descrição',
        'Ações'
    ]"
    :paginator="$planos_pagamento"
    :appends="$filters"
>
    @section('table-content')
        @foreach($planos_pagamento->items() as $index => $plano_pagamento)
            <tr>
                <td>{{ $plano_pagamento->nome }}</td>
                <td>{{ $plano_pagamento->descricao }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $plano_pagamento->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('pisteiro.edit', $plano_pagamento->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('plano-pagamento.delete', [
                        'uuid' => $plano_pagamento->uuid
                    ])"
                />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
