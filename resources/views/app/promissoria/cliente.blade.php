{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .header, .footer {
            text-align: center;
            padding: 10px;
            background-color: #004b87;
            color: #ffffff;
            font-size: 12px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .footer {
            font-style: italic;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            color: #444;
            margin-top: 20px;
            font-size: 22px;
        }

        .content {
            margin: 20px 0;
            line-height: 1.6;
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

    </style>
</head>
<body>
    <div class="header">
        <h2>Company Name</h2>
        <p>1234 Street, City, Country - Zip Code</p>
        <p>Phone: (123) 456-7890 | Email: info@company.com</p>
    </div>

    <h1>Monthly Financial Report</h1>

    <div class="content">
        <p>This report provides an overview of the key metrics for the month. Please find the detailed analysis in the table below, which highlights the items, their descriptions, quantities, unit prices, and total amounts.</p>
    </div>

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
    <div class="footer">
        <p>Generated on: {{ now() }} - by {{\Auth::user()->name}}</p>
        <p>Confidential - For Internal Use Only</p>
    </div>

</body>
</html> --}}


{{-- <!DOCTYPE html>
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
            font-size: 11px;
            background-color: #f5f5f5;
        }
        .header {
            text-align: center;
            background-color: #4a90e2;
            color: #fff;
            padding: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .header h2 {
            font-size: 14px;
            margin: 5px 0 0;
        }
        .section {
            margin: 20px auto;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section h3 {
            margin-top: 0;
            color: #333;
            font-size: 14px;
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
            font-size: 12px;
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
            font-size: 12px;
            color: #999;
            margin-top: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>3º LEILÃO HARAS JS DA MARAJOARA & CONVIDADOS</h1>
        <h2>Nota de Leilão e Contrato de Compra e Venda com Reserva de Domínio</h2>
        <p>Leiloeiro: Guilherme Minssen | Data: 22/06/2024 | Local: YouTube</p>
    </div>

    <!-- Seller Section -->
    <div class="section">
        <h3>Informações do Vendedor</h3>
        <div class="details-box">
            <h4>Vendedor</h4>
            <p class="info-item"><strong>Nome:</strong> JOAO REGIS DALLA MAESTRI - HARAS JS MARAJOARA</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> 471.121.156-04</p>
            <p class="info-item"><strong>Endereço:</strong> ROD 010 KM 16, PARADA E HOTEL CRICABOM, DOM ELISEU/PA</p>
            <p class="info-item"><strong>Fones:</strong> 94 98122-2848</p>
        </div>
    </div>

    <!-- Buyer Section -->
    <div class="section">
        <h3>Informações do Comprador</h3>
        <div class="details-box">
            <h4>Comprador</h4>
            <p class="info-item"><strong>Nome:</strong> JOSE RAFAEL LEAL MOURA</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> 750.018.372-00</p>
            <p class="info-item"><strong>Endereço:</strong> TV ENEAS PINHEIRO 2390, ED RIO ALBA, MARCO, BELEM/PA</p>
            <p class="info-item"><strong>Fones:</strong> 91 99182-8183, 91 99287-3563</p>
        </div>
    </div>

    <!-- Lot Details Section -->
    <div class="section">
        <h3>Dados do Lote</h3>
        <div class="lot-details">
            <table>
                <tr>
                    <th>Lote</th>
                    <td>013</td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>50% TIETA JS DA MARAJOARA</td>
                </tr>
                <tr>
                    <th>Espécie</th>
                    <td>Mangalarga Marchador</td>
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td>Fêmea</td>
                </tr>
                <tr>
                    <th>Cor</th>
                    <td>Castanha</td>
                </tr>
                <tr>
                    <th>Data de Nascimento</th>
                    <td>06/06/2023</td>
                </tr>
                <tr>
                    <th>Valor do Lote</th>
                    <td>R$ 5.500,00</td>
                </tr>
                <tr>
                    <th>Comissão</th>
                    <td>R$ 440,00</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Payment Terms Section -->
    <div class="section">
        <h3>Condições de Pagamento</h3>
        <p>No vencimento acima, pagarei(emos) por esta única via de Nota Promissória a <strong>3º LEILÃO HARAS JS DA MARAJOARA & CONVIDADOS</strong> a quantia de R$ 5.500,00 referente ao lote.</p>
        <p><strong>Data de Vencimento:</strong> 22/06/2024</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by starnet@starnet.inf.br</p>
    </div>

</body>
</html> --}}



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
            background-color: #f5f5f5;
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
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ asset("atual_leiloes_logo.png") }}" alt="" style="width: 150px; height: 150px;">
        <h1>3º LEILÃO HARAS JS DA MARAJOARA & CONVIDADOS</h1>
        <h2>Nota de Leilão e Contrato de Compra e Venda com Reserva de Domínio</h2>
        <p>Leiloeiro: Guilherme Minssen | Data: 22/06/2024 | Local: YouTube</p>
    </div>

    <!-- Seller Section -->
    <div class="section">
        <h3>Informações do Vendedor</h3>
        <div class="details-box">
            <h4>Vendedor</h4>
            <p class="info-item"><strong>Nome:</strong> JOAO REGIS DALLA MAESTRI - HARAS JS MARAJOARA</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> 471.121.156-04</p>
            <p class="info-item"><strong>Endereço:</strong> ROD 010 KM 16, PARADA E HOTEL CRICABOM, DOM ELISEU/PA</p>
            <p class="info-item"><strong>Fones:</strong> 94 98122-2848</p>
        </div>
    </div>

    <!-- Buyer Section -->
    <div class="section">
        <h3>Informações do Comprador</h3>
        <div class="details-box">
            <h4>Comprador</h4>
            <p class="info-item"><strong>Nome:</strong> JOSE RAFAEL LEAL MOURA</p>
            <p class="info-item"><strong>CPF/CNPJ:</strong> 750.018.372-00</p>
            <p class="info-item"><strong>Endereço:</strong> TV ENEAS PINHEIRO 2390, ED RIO ALBA, MARCO, BELEM/PA</p>
            <p class="info-item"><strong>Fones:</strong> 91 99182-8183, 91 99287-3563</p>
        </div>
    </div>

    <!-- Lot Details Section -->
    <div class="section">
        <h3>Dados do Lote</h3>
        <div class="lot-details">
            <table>
                <tr>
                    <th>Lote</th>
                    <td>013</td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>50% TIETA JS DA MARAJOARA</td>
                </tr>
                <tr>
                    <th>Espécie</th>
                    <td>Mangalarga Marchador</td>
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td>Fêmea</td>
                </tr>
                <tr>
                    <th>Cor</th>
                    <td>Castanha</td>
                </tr>
                <tr>
                    <th>Data de Nascimento</th>
                    <td>06/06/2023</td>
                </tr>
                <tr>
                    <th>Valor do Lote</th>
                    <td>R$ 5.500,00</td>
                </tr>
                <tr>
                    <th>Comissão</th>
                    <td>R$ 440,00</td>
                </tr>
            </table>
        </div>
        
        <!-- Lot Items Subsection -->
        <h4>Itens do Lote</h4>
        <div class="details-box">
            <p class="info-item"><strong>Item 1:</strong> Cuidado e manutenção até o transporte</p>
            <p class="info-item"><strong>Item 2:</strong> Documentação completa do animal</p>
            <p class="info-item"><strong>Item 3:</strong> Transporte garantido para destino final</p>
        </div>
    </div>

    <!-- Payment Terms Section -->
    <div class="section">
        <h3>Condições de Pagamento</h3>
        <p>No vencimento acima, pagarei(emos) por esta única via de Nota Promissória a <strong>3º LEILÃO HARAS JS DA MARAJOARA & CONVIDADOS</strong> a quantia de R$ 5.500,00 referente ao lote.</p>
        <p><strong>Data de Vencimento:</strong> 22/06/2024</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by starnet@starnet.inf.br</p>
    </div>

</body>
</html>


