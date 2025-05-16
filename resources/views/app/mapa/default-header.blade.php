<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório/Mapa de Leilão</title>
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
            padding: 1px;
        }
        .header h1 {
            font-size: 12px;
            margin: 0;
        }
        .header h2 {
            font-size: 11px;
            margin: 2px 0 0;
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
            background-color: #354c9c;
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
            background-color: #d3d2d2;
            color: #0c0c0c;
            font-weight: bold;
        }
        .report-table {
            width: 100%;
            margin: 12px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .report-table thead {
            background-color: #354c9c;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .report-table th,
        .report-table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .report-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .report-table tbody tr:hover {
            background-color: #d9edf7;
            cursor: pointer;
        }

        .report-table tfoot {
            background-color: #354c9c;
            color: #ffffff;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .report-table {
                font-size: 8px;
            }

            .report-table th,
            .report-table td {
                padding: 4px 5px;
            }
        }
        /* Styling for Money Columns */
        .report-table .money {
            color: #152a57; /* Darker green for text */
            font-weight: bold;
        }

        .report-table .money:hover {
            background-color: #c3e6cb; /* Slightly darker green on hover */
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
        <img src="https://yt3.googleusercontent.com/lELF6Or3zPu6dSntk6SkG8kDOWd0E8FML27cz8dQi1hRiG0F6HymU8X1bL27rwMbGDTDpIJDvy4=w1707-fcrop64=1,00005a57ffffa5a8-k-c0xffffffff-no-nd-rj" alt="Logo da Empresa" style="width: 35%; height: 40px;">
        <h1 class="text-uppercase">{{$leilao->descricao}}</h1>
        <p>
            <b>Leiloeiro:</b> {{$leilao->leiloeiro->nome}}
            | <b>Data:</b> {{date('d/m/Y', strtotime($leilao->fechado_em))}}
            | <b>Local:</b> {{$leilao->local}}
        </p>
        <h1 style="color: #1e32ec">{{$titulo ?? 'RELATÓRIO SEM TÍTULO'}}</h1>
    </div>

    @yield('content-mapa-'.$identificador)

    <!-- Footer -->
    <div class="footer">
        <p>{{$leilao->promotor->nome}}</p>
        <p>documento emitido por <b>{{Auth::user()->name}} </b> em <b>{{date('d/m/Y h:i:s')}}</b></p>
        <small>
            Sistema desenvolvido e mantido por CODE FIRST - ENGENHARIA DE SOFTWARE ÁGIL
        </small>
    </div>
</body>

</html>
