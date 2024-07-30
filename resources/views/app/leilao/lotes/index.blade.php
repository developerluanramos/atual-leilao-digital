<x-layouts.tables.simple-table
    :headers="[
//        'Código',
        'Plano Pagamento',
        'Condição Pagamento',
        'Comissão Venda',
        'Comissão Compra',
        'Criado em',
        'Última atualização',
        'Valor R$',
        'Opções',
    ]"
    :paginator="$lotes"
    :appends="['aba' => $aba]"
>
    @section('table-content')
        @foreach($lotes->items() as $index => $lote)
            <tr>
{{--                <td>{{$lote->uuid}}</td>--}}
                <td>{{$lote->plano_pagamento['descricao']}}</td>
                <td>{{$lote->condicao_pagamento_uuid}}</td>
                <td class="text-center">
                    <x-layouts.badges.sim-nao :status="$lote->incide_comissao_compra"></x-layouts.badges.sim-nao>
                </td>
                <td class="text-center">
                    <x-layouts.badges.sim-nao :status="$lote->incide_comissao_venda"></x-layouts.badges.sim-nao>
                </td>
                <td class="text-center">{{$lote->created_at_for_humans}}</td>
                <td class="text-center">{{$lote->updated_at_for_humans}}</td>
                <td class="text-right"> <b>{{Akaunting\Money\Money::BRL($lote->valor)}}</b> </td>
                <td class="text-right">
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
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
