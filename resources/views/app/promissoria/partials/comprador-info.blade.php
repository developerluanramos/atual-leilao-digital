<!-- Buyer Section -->
<div class="section">
    <h3>Informações do Comprador</h3>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Nome: </strong>{{$comprador->nome}}</td>
                <td style="width: 33%;"><strong>CPF/CNPJ:</strong> {{$comprador->cpf_cnpj}}</td>
                <td style="width: 33%;"><strong>Fones:</strong>{{$comprador->celular}}</td>
            </tr>
            <tr style="">
                <td colspan="2" style="width: 70%"><strong>Endereço: </strong>{{$comprador->endereco}}, {{$comprador->cep}}, {{$comprador->cidade}}/{{$comprador->uf}}</td>
                <td style="width: 30%;"><strong>Email: </strong>{{$comprador->email}}</td>
            </tr>
        </tbody>
    </table>
</div>