
@extends('app.promissoria.partials.layout')

@section('content-promissoria')

@include('app.promissoria.partials.vendedor-info', ['vendedor' => $compra->vendedor])

@include('app.promissoria.partials.comprador-info', ['comprador' => $compra->cliente])

@include('app.promissoria.partials.compra-info', ['compra' => $compra])

@include('app.promissoria.partials.assinatura-info', ['compra' => $compra])

<br>
@include('app.promissoria.partials.pagamento-info', ['compra' => $compra])

<div class="page-break"></div>

<div class="section" style="position: relative; margin-left: -10px; margin-bottom: 20px; font-size: 12px; border: solid 0.5px black; padding: 10">
    <h3>NOTA PROMISSÓRIA ÚNICA</h3>
    <p class="text-center">
        <img class="brasao" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Coat_of_arms_of_Brazil.svg/1200px-Coat_of_arms_of_Brazil.svg.png" alt="">
    </p>
    <p>
        No vencimento acima, pagarei(emos) por esta única via de Nota Promissória a 
        <strong class="text-uppercase">{{$compra->vendedor->nome}}</strong> CPF/CNPJ:<strong class="text-uppercase">{{$compra->vendedor->cpf_cnpj}}</strong> 
        ou a sua ordem a quantia supra de 
        <strong><x-layouts.badges.info-money
            :convert="false"
            :textLength="'lg'"
            :value="$compra->valor"
        /></strong>
        em moeda corrente do país, na praça de <strong class="text-uppercase">{{$compra->leilao->local}}</strong> pela compra que lhe fizemos no <strong class="text-uppercase">{{$compra->leilao->descricao}}</strong>
    </p>
    <div style="text-align: center; position: absolute; top: 220px; left: 50%; transform: translateX(-50%);
            font-size: 5em; font-weight: bold; color: rgba(7, 7, 7, 0.253); white-space: nowrap;">
        SEM VALOR
    </div>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Vencimento: </strong> {{date('d/m/Y', strtotime($compra->parcelas[0]->vencimento_em))}}</td>
                <td style="width: 33%;"><strong>Lote:</strong> 0{{$compra->lote->id}} - {{$compra->lote->descricao}}</td>
                <td style="width: 33%;"><strong>Valor :</strong><x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="$compra->valor"
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

@endsection
    