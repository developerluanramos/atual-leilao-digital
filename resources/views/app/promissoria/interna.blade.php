
@extends('app.promissoria.partials.layout')

@section('content-promissoria')

@include('app.promissoria.partials.vendedor-info', ['vendedor' => $compra->vendedor])

@include('app.promissoria.partials.comprador-info', ['comprador' => $compra->cliente])

@include('app.promissoria.partials.compra-info', ['compra' => $compra])

@include('app.promissoria.partials.assinatura-info', ['compra' => $compra])

@include('app.promissoria.partials.pagamento-info', ['compra' => $compra])

<div class="page-break"></div>

<div class="section" style="position: relative; margin-left: -10px; margin-bottom: 20px; font-size: 12px; border: solid 0.5px black; padding: 10">
    <h3>NOTA PROMISSÓRIA ÚNICA</h3>
    <p class="text-center">
        <img class="brasao" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Coat_of_arms_of_Brazil.svg/1200px-Coat_of_arms_of_Brazil.svg.png" alt="">
    </p>
    <p>
        No vencimento acima, pagarei(emos) por esta única via de Nota Promissória a 
        <strong class="text-uppercase">Atal Leilões e Eventos LTDA</strong> CPF/CNPJ:<strong class="text-uppercase">06.286.217/0001-96</strong> 
        ou a sua ordem a quantia supra de 
        <strong><x-layouts.badges.info-money
            :convert="false"
            :textLength="'lg'"
            :value="$compra->valor"
        /></strong>
        em moeda corrente do país, na praça de <strong class="text-uppercase"></strong><x-layouts.badges.info-money
        :convert="false"
        :textLength="'lg'"
        :value="$compra->valor_comissao_comprador"
    /></strong> pela compra que lhe fizemos no <strong class="text-uppercase">{{$compra->leilao->descricao}}</strong>
    </p>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Vencimento: </strong> {{date('d/m/Y', strtotime($compra->parcelas[0]->vencimento_em))}}</td>
                <td style="width: 33%;"><strong>Lote:</strong> 0{{$compra->lote->id}} - {{$compra->lote->descricao}}</td>
                <td style="width: 33%;"><strong>Valor :</strong><x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="$compra->valor_comissao_comprador"
                /></td>
            </tr>
        </tbody>
    </table>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Nome:</strong> {{$compra->cliente->nome}} <strong>CPF/CNPJ:</strong> {{$compra->cliente->cpf_cnpj}} <strong>Fones:</strong> {{$compra->cliente->celular}}</td>
            </tr>
            <tr style="">
                <td style="width: 33%;"><strong>Endereço:</strong> {{$compra->cliente->endereco}}, {{$compra->cliente->cep}}, {{$compra->cliente->cidade}}/{{$compra->cliente->uf}}</td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center">
        <hr style="color:black; width:40%; margin-top:40px;">
    </p>
    <p style="text-align: center">
        {{$compra->cliente->nome}}
    </p>
</div>
<div class="section" style="position: relative; margin-left: -10px; margin-bottom: 20px; font-size: 12px; border: solid 0.5px black; padding: 10">
    <h4 class="text-center">DADOS PARA NOTA FISCAL</h4>
    <h5 class="text-center">{{$compra->leilao->descricao}}</h5>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Vendedor:</strong> {{$compra->vendedor->nome}} <strong>CPF/CNPJ:</strong> {{$compra->vendedor->cpf_cnpj}}</td>
            </tr>
            <tr style="">
                <td style="width: 33%;"><strong>Comprador:</strong> {{$compra->cliente->nome}} <strong>CPF/CNPJ:</strong> {{$compra->cliente->cpf_cnpj}}</td>
            </tr>
            <tr style="">
                <td style="width: 100%;"><strong>Lote: </strong>0{{$compra->lote->id}} - 
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota"
                    ></x-layouts.badges.info-percent>
                    de
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota_vendedor"
                    ></x-layouts.badges.info-percent>  {{$compra->lote->descricao}}
                    Doc.: <strong style="color:red">DOCUMENTO</strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<hr style="width: 100%; border: dashed 1px black;">
<div class="section" style="position: relative; margin-left: -10px; margin-bottom: 20px; font-size: 12px; border: solid 0.5px black; padding: 10">
    <h4 class="text-center">LIBERAÇÃO DE EMBARQUE</h4>
    <h5 class="text-center">{{$compra->leilao->descricao}}</h5>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Vendedor:</strong> {{$compra->vendedor->nome}} <strong>CPF/CNPJ:</strong> {{$compra->vendedor->cpf_cnpj}}</td>
            </tr>
            <tr style="">
                <td style="width: 33%;"><strong>Comprador:</strong> {{$compra->cliente->nome}} <strong>CPF/CNPJ:</strong> {{$compra->cliente->cpf_cnpj}}</td>
            </tr>
            <tr style="">
                <td style="width: 100%;"><strong>Lote: </strong>0{{$compra->lote->id}} - 
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota"
                    ></x-layouts.badges.info-percent>
                    de
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :value="$compra->percentual_cota_vendedor"
                    ></x-layouts.badges.info-percent>  {{$compra->lote->descricao}}
                    Doc.: <strong style="color:red">DOCUMENTO</strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
    