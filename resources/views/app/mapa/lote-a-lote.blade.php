<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mapa de Leilão - Lote a Lote</title>
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
    background-color: #007bff;
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
    background-color: #007bff;
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
        {{-- <img src="{{ asset("atual_leiloes_logo.png") }}" alt="" style="width: 150px; height: 150px;"> --}}
        <h1 class="text-uppercase">{{$leilao->descricao}}</h1>
        <h2>Mapa Lote a Lote</h2>
        <p>
            <b>Leiloeiro:</b> {{$leilao->leiloeiro->nome}} 
            | <b>Data:</b> {{date('d/m/Y', strtotime($leilao->fechado_em))}} 
            | <b>Local:</b> {{$leilao->local}}
        </p>
    </div>
    {{-- @yield('content-promissoria') --}}
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Lote</th>
                <th>Gênero</th>
                <th>Multiplicador</th>
                <th>C. Comprador</th>
                <th>C. Vendedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($leilao->lotes()->get() as $lote)
                <tr>
                    <td style="text-align: left !important">
                        0{{$lote->numero}} - <small><b>{{$lote->descricao}}</b></small><br>
                        <small>{{$lote->observacoes}}</small>
                    </td>
                    <td>
                        <small> M {{$lote->quantidade_macho}}
                        | F {{$lote->quantidade_femea}}
                        | O {{$lote->quantidade_outro}} </small>
                    </td>
                    <td style="float: right; text-align:right">{{$lote->multiplicador}}</td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->valor_comissao_compra"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$lote->valor_comissao_venda"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'lg'"
                            :value="$lote->valor_total"
                            />
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Comprador</th>
                                    <th>Vendedor</th>
                                    <th>C. Vend</th>
                                    <th>C. Comp</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lote->compras()->with(['cliente', 'vendedor'])->get() as $compra)
                                    
                                @endforeach
                                <tr>
                                    <td>
                                        <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="$compra->percentual_cota"
                                        ></x-layouts.badges.info-percent>
                                        <small>{{$compra->cliente->nome}}</small>
                                    </td>
                                    <td>
                                        <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="$compra->percentual_cota_vendedor"
                                        ></x-layouts.badges.info-percent>
                                        <small>{{$compra->vendedor->nome}}</small>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="8"
                                            ></x-layouts.badges.info-percent>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$compra->valor_comissao_comprador"
                                            />
                                        </strong>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-percent
                                            :convert="false"
                                            :value="10"
                                            ></x-layouts.badges.info-percent>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'sm'"
                                            :value="$compra->valor_comissao_vendedor"
                                            />
                                        </strong>
                                    </td>
                                    <td class="money" style="float: right; text-align:right">
                                        <strong>
                                            <x-layouts.badges.info-money
                                            :convert="false"
                                            :textLength="'lg'"
                                            :value="$compra->valor"
                                            />
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @empty
                <b>Nenhum lote registrado neste leilão</b>
            @endforelse
        </tbody>
    </table>

    <h2 class="">Consolidado</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Valor Total Leilão</th>
                <th>Valor Comissão Comprador</th>
                <th>Valor Comissão Vendedor</th>
                <th>Valor Total Comissão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_total"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_compra"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_venda"
                        />
                    </strong>
                </td>
                <td class="money">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_total"
                        />
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by KOLARES TI - ENGENHARIA DE SOFTWARE ÁGIL</p>
        <p>documento emitido por <b>{{Auth::user()->name}}</b> {{date('d/m/Y h:i:s')}}</p>
    </div>
</body>
</html>