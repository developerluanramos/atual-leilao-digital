@extends('app.promissoria.partials.layout', ['via' => 'Via Vendedor (branca)'])

@section('content-promissoria')

@include('app.promissoria.partials.vendedor-info', ['vendedor' => $compra->vendedor])

@include('app.promissoria.partials.comprador-info', ['comprador' => $compra->cliente])

@include('app.promissoria.partials.compra-info', ['compra' => $compra])

@include('app.promissoria.partials.assinatura-info', ['compra' => $compra])

@include('app.promissoria.partials.pagamento-info', ['compra' => $compra])

<style>
     h2 {
            text-align: center;
            font-weight: bold;
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        p, li {
            font-size: 1em;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        .contract-section {
            margin-bottom: 10px;
        }
        .signature-section {
            margin-top: 30px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 80%;
            margin: 10px auto;
        }
        .signature-title {
            margin-top: 10px;
            font-size: 0.9em;
        }
</style>
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
        em moeda corrente do país, na praça de <strong class="text-uppercase">{{$compra->leilao->cidade}}</strong> pela compra que lhe fizemos no <strong class="text-uppercase">{{$compra->leilao->descricao}}</strong>
    </p>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Vencimento: </strong> {{date('d/m/Y', strtotime($compra->parcelas[0]->vencimento_em))}}</td>
                <td style="width: 33%;"><strong>Lote:</strong> 0{{$compra->lote->numero}} - {{$compra->lote->descricao}}</td>
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

<div class="page-break"></div>


<h2 class="text-uppercase">{{$compra->leilao->descricao}}</h2>
<h3 class="text-uppercase text-center">CONTRATO DE COMPRA E VENDA COM RESERVA DE DOMÍNIO VINCULADO A NOTA DE LEILÃO</h3>

<ul>
    <li class="contract-section">
        <strong>1)</strong> O presente contrato de Compra e Venda é de instrumento particular que firmado pelo COMPRADOR e VENDEDOR que cria um vínculo jurídico e obrigacional entre as partes, pela qual a Atual Leilões formalizará através de Leilão por ela realizado.
    </li>
    <li class="contract-section">
        <strong>2)</strong> As partes COMPRADOR e VENDEDOR encontram-se qualificados na nota de Leilão e neste ato o vendedor declara ser legítimo possuidor e proprietário do(s) animal(is) / produto(s) especificado(s).
    </li>
    <li class="contract-section">
        <strong>3)</strong> Para garantia do presente Contrato será emitida, pelo COMPRADOR, NOTA PROMISSÓRIA ÚNICA, vinculada à nota de leilão que deverá ser assinada pelo mesmo, antes da entrega do(s) animal(is), com data de vencimento à vista da apresentação. Essa NOTA PROMISSÓRIA ÚNICA será desmembrada em parcelas mensais de acordo com as datas, valores e vencimentos constantes no verso deste Contrato, no corpo da Nota de Leilão e Contrato de Compromisso.
    </li>
    <li class="contract-section">
        <strong>4)</strong> Pelo instrumento particular de Compra e Venda com reserva de domínio, vinculado a nota de leilão, fica reservado ao VENDEDOR a propriedade do(s) animal(is) / produto(s) ora vendido(s), até que seja pago totalmente o preço com a liquidação da última parcela pactuada no referido contrato, bem como a devolução da NOTA PROMISSÓRIA ÚNICA, mencionada no item 3 (três).
        <ul>
            <li><strong>4.1)</strong> O COMPRADOR por sua vez se compromete a manter o(s) animal(is) / produto(s) adquirido(s) neste leilão, protegidos pelas normas e medidas sanitárias exigidas e profiláticas recomendadas em cada caso, contra a incidência de zoonoses, moléstias infecciosas ou parasitárias de ocorrência frequentes.</li>
            <li><strong>4.2)</strong> Caso venha a ocorrer a morte do(s) animal(is) ou perecimento do(s) produto(s) na posse do COMPRADOR, tal fato não desobriga do pagamento do saldo devedor. Se a morte ou perecimento se der por culpa do VENDEDOR devidamente comprovada, faculta-se ao COMPRADOR a substituição do(s) animal(is) / produto(s), morto(s) ou perecido(s), por outro da mesma espécie e categoria do(s) adquirido(s).</li>
            <li><strong>4.3)</strong> O domínio do(s) animal(is) / produto(s) ora transacionado(s) somente será adquirido pelo COMPRADOR depois do pagamento integral do preço, oportunidade em que o VENDEDOR entrega ao mesmo COMPRADOR os documentos necessários ao registro da operação na respectiva Associação de Criadores, bem como a NOTA PROMISSÓRIA ÚNICA.</li>
            <li><strong>4.4)</strong> As "crias" que nascerem do(s) animal(is) comercializado(s) no leilão serão considerados frutos ou rendimentos provenientes do lote adquirido, de acordo com o art.95 do Código Civil. Em caso de inadimplência, os frutos e rendimentos também serão restituídos ao VENDEDOR, integrando também a reserva de domínio estipulado neste documento.</li>
        </ul>
    </li>
    <li class="contract-section">
        <strong>5)</strong> A falta de pagamento de 03 (três) parcelas pactuadas no contrato de compra e venda implicará no vencimento antecipado de todo o saldo devedor, ficando assegurado ao vendedor o direito, a seu exclusivo critério, promover, nos termos do artigo 1070 do CPC, a cobrança executiva da totalidade da dívida, acrescido de juros legais mais correção monetária plena, a proceder de acordo com o artigo 1071 do mesmo diploma legal, com o protesto da Nota Promissória Única, preenchida pelo vendedor somente pelo saldo devedor restante optando pela apreensão e depósito do(s) animal(is), reincidindo-se em consequência o presente contrato e perdendo o comprador, em favor do vendedor, o sinal pago. (Parágrafo Único, artigo 10, Lei 4021/61).
    </li>
    <li class="contract-section">
        <strong>5.1)</strong> A falta de pagamento na data do vencimento de qualquer das parcelas pactuadas neste instrumento, acarretará para o COMPRADOR a obrigatoriedade de pagar ao VENDEDOR encargos de 1% (um por cento) ao mês, mais correção pela taxa referencial vigente à época, até a data da liquidação do débito, além de multa de 2% (dois por cento) sobre o montante do débito.
    </li>
    <li class="contract-section">
        <strong>5.2)</strong> A Atual Leilões atua como intermediária das transações, sendo responsável pela organização e coordenação do evento, não se responsabilizando pelo inadimplemento do comprador, seja em relação ao valor do(s) produto(s) / animal(is) adquirido(s), seja em relação às comissões de venda. Portanto, cabe ao vendedor manifestar-se sobre o cadastro do comprador antes da assinatura do contrato de compra e venda, bem como exigir a assinatura de avalista antes da formalização deste contrato.
    </li>
    <li class="contract-section">
        <strong>6)</strong> Fica fazendo parte integrante deste contrato o Regulamento e demais disposições ou condições de venda e compra impressas no Catálogo do leilão, normas essas que o COMPRADOR e o VENDEDOR declaram conhecer e aceitar em todos os seus termos.
    </li>
    <li class="contract-section">
        <strong>7)</strong> O COMPRADOR, neste ato declara receber e aceitar o(s) animal(is) / produto(s) adquirido(s) nas condições físicas em que foi(ram) apregoado(s) no leilão. Caso não haja manifestação do COMPRADOR a respeito do estado físico do(s) animal(is) / produto(s), até o momento de sua retirada do local do leilão, a validade de tais circunstâncias não poderá mais ser questionada, sob qualquer fundamento.
    </li>
    <li class="contract-section">
        <strong>8)</strong> Assina também o presente o avalista indicado, com a devida outorga uxória do cônjuge se casado for, conforme artigo 1647, inciso III do Código Civil, na condição de, solidariamente, ser responsável por todas as obrigações decorrentes deste contrato.
    </li>
    <li class="contract-section">
        <strong>9)</strong> Antes do pagamento da totalidade do preço, fica expressamente vedado ao COMPRADOR alienar ou prometer alienar, emprestar, ceder, dar em penhor ou garantia o(s) animal(ais) / produto(s) e respectiva(s) cria(s), bem como a cessão ou transferência deste(s) a terceiros sem prévia autorização expressa do VENDEDOR, ensejando a rescisão do contrato.
    </li>
    <li class="contract-section">
        <strong>10)</strong> Salvo estabelecido de forma diversa, por escrito, antes do leilão, o comprador será responsável pelo pagamento da comissão de compra, em como o vendedor será responsável pela comissão de venda, as quais recaem sobre o valor do lote no momento da batida do martelo, em favor do PROMOTOR DE EVENTO / EMPRESA LEILOEIRA, cujo percentual será divulgado pelo leiloeiro no início do evento.
    </li>
    <li class="contract-section">
        <strong>11)</strong> As taxas e impostos incidentes sobre a venda, tais como: transporte, manutenção, alojamento, seguro e/ou qualquer outra despesa será de responsabilidade do comprador.
    </li>
</ul>
@endsection
