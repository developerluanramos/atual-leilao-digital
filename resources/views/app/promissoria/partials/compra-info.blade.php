<!-- Lot Details Section -->
<div class="section">
    <h3>Dados do Lote</h3>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 80%;"><strong>Lote: </strong>0{{$compra->lote->id}} - 
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota"
                    ></x-layouts.badges.info-percent>
                    de
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota_vendedor"
                    ></x-layouts.badges.info-percent>  {{$compra->lote->descricao}}</td>
                <td style="width: 20%;"><strong>Valor:</strong><x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="$compra->valor"
                /></td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%">
        <tbody>
            @forelse ($compra->lote->itens as $item)
                <tr>
                    <td><strong>Nome:</strong> xxx</td>
                    <td colspan="2"><strong>Descrição Animal:</strong>  {{$item->descricao}}</td>
                    <td><strong>Número ID:</strong> xxx</td>
                </tr>
                <tr style="border-top: solid 1px black">
                    <td><strong>Espécie:</strong> {{$item->especie->nome}}</td>
                    <td><strong>Raça:</strong> {{$item->raca->nome}}</td>
                    <td><strong>Sexo:</strong> {{\App\Enums\GeneroLoteItemEnum::getKey((int)$item->genero)}}</td>
                    <td><strong>Cor:</strong> xxx</td>
                </tr>
            @empty
                <b>Nenhum item adicionado neste lote</b>
            @endforelse
        </tbody>
    </table>
</div>