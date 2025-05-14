<div style="text-align: center; font-weight: bold; margin-bottom: 20px;">
    Após assinatura deste instrumento, ficam as partes de acordo com as disposições gerais que se
    encontram no verso, e que passam a ser parte integrante do mesmo
    <br><br>
    {{$compra->leilao->cidade}}, {{date('d/m/Y', strtotime($compra->leilao->fechado_em))}}
</div>
<table style="width: 100%; text-align: center; margin-top: 20px;">
    <tr>
        <td style="width: 50%; padding: 0 10px;">
            <hr style="border: none; border-top: 1px solid black; width: 100%;">
            {{$compra->cliente->nome}}
            <br><br>
            <hr style="border: none; border-top: 1px solid black; width: 100%; margin-top: 10px;">
            Testemunha
        </td>
        <td style="width: 50%; padding: 0 10px;">
            <hr style="border: none; border-top: 1px solid black; width: 100%;">
            {{$compra->vendedor->nome}}
            <br><br>
            <hr style="border: none; border-top: 1px solid black; width: 100%; margin-top: 10px;">
            Testemunha
        </td>
    </tr>
</table>
