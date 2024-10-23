<x-layouts.tables.simple-table
    :headers="[
        'Número',
        'Descrição',
        'Plano Pagamento',
        'Comissão Venda',
        'Comissão Compra',
        'Criado em',
        'Última atualização',
        'Valor Estimado R$',
        'Opções',
    ]"
    :paginator="$lotes"
    :appends="['aba' => $aba]"
>
    @section('table-content')
        @foreach($lotes->items() as $index => $lote)
            <tr>
                <td>
                    {{$lote->id}}
                </td>
                <td>
                    {{$lote->descricao}}
                </td>
                <td>
                    {{$lote->plano_pagamento['descricao']}}
                </td>
                <td class="text-center">
                    <x-layouts.badges.sim-nao :status="$lote->incide_comissao_venda"></x-layouts.badges.sim-nao>
                </td>
                <td class="text-center">
                    <x-layouts.badges.sim-nao :status="$lote->incide_comissao_compra"></x-layouts.badges.sim-nao>
                </td>
                <td class="text-center">
                    {{$lote->created_at_for_humans}}
                </td>
                <td class="text-center">
                    {{$lote->updated_at_for_humans}}
                </td>
                <td class="text-right">
                    <x-layouts.badges.info-money
                        textLength="sm"
                        :convert="false"
                        :value="$lote->valor_estimado"
                    />
                </td>
                <td class="text-right">
                    <a href="{{route('compra.create', ['loteUuid' => $lote->uuid])}}">
                        <button
                            type="button"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </a>
                    <x-layouts.buttons.action-button
                        text="Ver"
                        action="ver"
                        color="secondary"
                        :route="route('leilao.lote.show', ['uuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])"/>
                    <x-layouts.buttons.action-button
                        text="Editar"
                        action="editar"
                        color="primary"
                        :route="route('leilao.lote.edit', ['uuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])"/>
                    <x-layouts.buttons.action-button
                        text="Excluir"
                        action="excluir"
                        color="danger"
                        :identificador="'drawer-delete-confirmacao'"
                        :route="route('leilao.lote.delete', [
                            'uuid' => $leilao->uuid,
                            'loteUuid' => $lote->uuid 
                        ])"
                    />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
