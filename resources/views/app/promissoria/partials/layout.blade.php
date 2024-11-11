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
    padding: -20;
    font-size: 10px;
    background-color: white;
}
.header {
    text-align: center;
    background-color: white;
    color: #111010;
    padding: 5px;
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
    background-color: #ffffff;
    border-radius: 8px;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 5; position: relative; display: block;
    margin-bottom: 20px;
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
.outer-table {
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
}

.inner-table {
    width: 100%;
    border-collapse: collapse;
}

.inner-table td {
    /* border: 1px solid #000; */
    padding: 2px;
    text-align: center;
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
        <h1 class="text-uppercase">{{$compra->leilao->descricao}}</h1>
        <h2>Nota de Leilão e Contrato de Compra e Venda com Reserva de Domínio</h2>
        <p><b>Leiloeiro:</b> {{$compra->leilao->leiloeiro->nome}} | <b>Data:</b> {{$compra->leilao->fechado_em}} | <b>Local:</b> {{$compra->leilao->local}}</p>
    </div>
    @yield('content-promissoria')

    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by KOLARES TI - ENGENHARIA DE SOFTWARE ÁGIL</p>
        <p>documento emitido por <b>{{Auth::user()->name}}</b> {{date('d/m/Y')}}</p>
    </div>
</body>
</html>