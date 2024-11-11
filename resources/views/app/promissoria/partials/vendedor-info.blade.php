<!-- Seller Section -->
<div class="section">
    <h3>Informações do Vendedor</h3>
    <table style="width:100%">
        <tbody>
            <tr style="">
                <td style="width: 33%;"><strong>Nome: </strong>{{$vendedor->nome}}</td>
                <td style="width: 33%;"><strong>CPF/CNPJ:</strong> {{$vendedor->cpf_cnpj}}</td>
                <td style="width: 33%;"><strong>Fones:</strong>{{$vendedor->celular}}</td>
            </tr>
            <tr style="">
                <td colspan="2" style="width: 70%"><strong>Endereço: </strong>{{$vendedor->endereco}}, {{$vendedor->cep}}, {{$vendedor->cidade}}/{{$vendedor->uf}}</td>
                <td style="width: 30%;"><strong>Email: </strong>{{$vendedor->email}}</td>
            </tr>
        </tbody>
    </table>
</div>