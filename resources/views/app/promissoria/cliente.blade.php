<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota de Leilão e Contrato de Compra e Venda</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 10px;
            background-color: #f8bff8;
        }
        .header {
            text-align: center;
            background-color: #4a90e2;
            color: #fff;
            padding: 20px;
        }
        .header h1 {
            font-size: 14px;
            margin: 0;
        }
        .header h2 {
            font-size: 11px;
            margin: 5px 0 0;
        }
        .section {
            margin: 20px auto;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 5; position: relative; display: block;
        }
        .section h3 {
            margin-top: 0;
            color: #333;
            font-size: 11px;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 5px;
        }
        .details-box {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #f1f8ff;
        }
        .details-box h4 {
            margin: 0;
            color: #4a90e2;
            font-size: 10px;
            margin-bottom: 10px;
        }
        .info-item {
            margin-bottom: 8px;
        }
        .info-item strong {
            color: #333;
        }
        .lot-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .lot-details th, .lot-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .lot-details th {
            background-color: #4a90e2;
            color: #fff;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            color: #999;
            margin-top: 20px;
            padding: 10px;
        }
        .page-break {
            page-break-after: always;
        }
        .report-table {
            font-size: 11px;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .report-table th, .report-table td {
            padding: 2px 4px;
            border: 1px solid #ddd;
            font-size: 10px;
        }
        .report-table th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
        }
        .report-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .report-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .report-table tfoot th {
            font-size: 10px;
            background-color: #e8e8e8;
        }

        .money {
            text-align: right;
            font-weight: bold;
            color: #004b87;
        }

        .date {
            text-align: right;
            color: #004b87;
        }
        .text-center {
            text-align: center;
        }
        .brasao {
            width: 100px;
            height: 100px;
        }
        /* Container for the grid layout */
        .multi-column-table {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 equal-width columns */
            gap: 1px;
            border: 1px solid #333;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        
        /* Individual column styling */
        .column {
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }
        
        /* Each record/row styling */
        .record {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            border-bottom: 1px solid #eee;
        }
        
        /* Final row in each column */
        .record:last-child {
            border-bottom: none;
        }
        
        /* Styling for number, date, and amount */
        .number {
            font-weight: bold;
            color: #333;
        }
        
        .date,
        .amount {
            color: #555;
        }

        .text-uppercase {
            text-transform: uppercase
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        {{-- <img src="{{ asset("atual_leiloes_logo.png") }}" alt="" style="width: 150px; height: 150px;"> --}}
        <h1>{{$compra->leilao->descricao}}</h1>
        <h2>Nota de Leilão e Contrato de Compra e Venda com Reserva de Domínio</h2>
        <p>Leiloeiro: {{$compra->leilao->leiloeiro->nome}} | Data: {{$compra->leilao->fechado_em}} | Local: {{$compra->leilao->local}}</p>
    </div>

    <!-- Seller Section -->
    <div class="section">
        <h3>Informações do Vendedor</h3>
        <div class="details-box">
            <p class="info-item"><strong>Nome:</strong> {{$compra->vendedor->nome}}</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> {{$compra->vendedor->cpf_cnpj}}</p>
            <p class="info-item"><strong>Endereço:</strong> {{$compra->vendedor->endereco}}, {{$compra->vendedor->cep}}, {{$compra->vendedor->cidade}}/{{$compra->vendedor->uf}}</p>
            <p class="info-item"><strong>Fones:</strong> {{$compra->vendedor->celular}}</p>
            <p class="info-item"><strong>Email:</strong> {{$compra->vendedor->email}}</p>
        </div>
    </div>

    <!-- Buyer Section -->
    <div class="section">
        <h3>Informações do Comprador</h3>
        <div class="details-box">
            <p class="info-item"><strong>Nome:</strong> {{$compra->cliente->nome}}</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> {{$compra->cliente->cpf_cnpj}}</p>
            <p class="info-item"><strong>Endereço:</strong> {{$compra->cliente->endereco}}, {{$compra->cliente->cep}}, {{$compra->cliente->cidade}}/{{$compra->cliente->uf}}</p>
            <p class="info-item"><strong>Fones:</strong> {{$compra->cliente->celular}}</p>
            <p class="info-item"><strong>Email:</strong> {{$compra->cliente->email}}</p>
        </div>
    </div>

    <!-- Lot Details Section -->
    <div class="section">
        <h3>Dados do Lote</h3>
        <div class="lot-details">
            <table>
                <tr>
                    <th>Lote</th>
                    <td><strong>0{{$compra->lote->id}}</strong></td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>{{$compra->lote->descricao}}</td>
                </tr>
                <tr>
                    <th>Valor do Lote</th>
                    <td><x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'lg'"
                        :value="$compra->valor"
                    /></td>
                </tr>
            </table>

            <h4>Itens do Lote</h4>
            @forelse ($compra->lote->itens as $item)
                <div class="details-box">
                    <p class="info-item" style="color:red"><strong>Nome:</strong> xxx</p>
                    <p class="info-item"><strong>Descrição:</strong>  {{$item->descricao}}</p>
                    <p class="info-item" style="color:red"><strong>Número ID:</strong> xxx</p>
                    <p class="info-item"><strong>Espécie:</strong> {{$item->especie->nome}}</p>
                    <p class="info-item"><strong>Raça:</strong> {{$item->raca->nome}}</p>
                    <p class="info-item"><strong>Sexo:</strong> {{\App\Enums\GeneroLoteItemEnum::getKey((int)$item->genero)}}</p>
                    <p class="info-item" style="color:red"><strong>Cor:</strong> xxx</p>
                </div>
            @empty
                <b>Nenhum item adicionado neste lote</b>
            @endforelse
        </div>
    </div>
    
    <!-- Buyer Section -->
    <div class="section">
        <h3>Programação do Pagamento</h3>
        <table class="report-table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="text-center">Número</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Data de pagamento</th>
                    <th class="text-right">R$ Valor parcela</th>
                </tr>
            </thead>
            <tbody>
                @forelse($compra->parcelas as $index => $parcela)
                    <tr>
                        <td class="text-left">
                            {{$index + 1}}
                        </td>
                        <td class="text-left">
                            <x-layouts.badges.status-parcela
                                :status="(int)$parcela['status']"
                            />
                        </td>
                        <td class="text-center date">
                            {{\Carbon\Carbon::createFromFormat('Y-m-d', $parcela['vencimento_em'])->toDateString()}}
                        </td>
                        <td class="text-right money">
                            <x-layouts.badges.info-money
                                :convert="false"
                                :textLength="'lg'"
                                :value="$parcela['valor']"
                            /> ({{$parcela['repeticoes']}})
                        </td>
                    </tr>
                @empty
                    Nenhum parcela adicionada
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="page-break"></div>

    <!-- Payment Terms Section -->
    <div class="section" style="z-index: 5; position: relative; display: block;">
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
        <p style="text-align: center; font-size:65px; color:red">
            SEM VALOR
        </p>
        <p><strong>Data de Vencimento:</strong> <span>{{$compra->parcelas[0]->vencimento_em}}</span></p>
        <p><strong>Lote:</strong> 0{{$compra->lote->id}} - {{$compra->lote->descricao}}</p>
        <p><strong>Valor:</strong>  <strong><x-layouts.badges.info-money
            :convert="false"
            :textLength="'lg'"
            :value="$compra->valor"
        /></strong></p>
        <div class="details-box">
            <p class="info-item"><strong>Nome:</strong> {{$compra->cliente->nome}} <strong>CPF/CNPJ:</strong> {{$compra->cliente->cpf_cnpj}}</p>
            <p class="info-item"><strong>Endereço:</strong> {{$compra->cliente->endereco}}, {{$compra->cliente->cep}}, {{$compra->cliente->cidade}}/{{$compra->cliente->uf}}</p>
            <p class="info-item"><strong>Fones:</strong> {{$compra->cliente->celular}}</p>
        </div>

        <p style="text-align: center">
            <hr style="color:black; width:40%; margin-top:40px;">
        </p>
        <p style="text-align: center">
            {{$compra->cliente->nome}}
        </p>
    </div>

    <p style="text-align: center">
        <hr style="color:black; width:40%; margin-top:40px;">
    </p>
    <p style="text-align: center">
        {{$compra->cliente->nome}}
    </p>
    <p style="text-align: center">
        <hr style="color:black; width:40%; margin-top:40px;">
    </p>
    <p style="text-align: center;">
        {{$compra->vendedor->nome}}
    </p>

    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by KOLARES TI - ENGENHARIA DE SOFTWARE ÁGIL</p>
    </div>
</body>
</html>
