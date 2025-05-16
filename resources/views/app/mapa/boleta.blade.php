<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10px;
    }
    .page-break {
        page-break-after: always;
        visibility: hidden;
    }
    .lote-group {
        page-break-inside: avoid;
    }
</style>

@foreach($lotes->chunk(3) as $group)
    <div class="lote-group">
        @foreach($group as $lote)
            <table style="width: 100%; border: solid 1px black">
                <thead>
                <tr>
                    <th style="text-align: left;width: 30%">
                        <img src="https://yt3.googleusercontent.com/lELF6Or3zPu6dSntk6SkG8kDOWd0E8FML27cz8dQi1hRiG0F6HymU8X1bL27rwMbGDTDpIJDvy4=w1707-fcrop64=1,00005a57ffffa5a8-k-c0xffffffff-no-nd-rj" alt="Logo da Empresa" style="width: 200px; height: 40px;">
                    </th>
                    <th style="text-align: center;width: 60%">
                        {{$leilao->descricao}} <br>
                        {{$leilao->local}}
                    </th>
                    <th style="background-color: #0d1116; color: white; font-weight: bold; text-align: right;width: 10%">
                        LOTE {{$lote->numero}}
                    </th>
                </tr>
                </thead>
            </table>
            <table style="width: 100%; border: solid 1px black">
                <thead>
                <tr>
                    <th style="text-align: center;">
                        Lance
                    </th>
                    <th style="text-align: center;">

                    </th>
                    <th style="text-align: center;">
                        Val. Unit.
                    </th>
                    <th style="text-align: center;">

                    </th>
                    <th style="text-align: center;">
                        Qtd
                    </th>
                    <th style="text-align: center;">
                        Total Lote
                    </th>
                </tr>
                <tr>
                    <th style="text-align: left; border: solid 1px black;">
                        R$
                    </th>
                    <th style="text-align: center;">
                        x
                    </th>
                    <th style="text-align: left; border: solid 1px black;">
                        R$
                    </th>
                    <th style="text-align: center;">
                        x
                    </th>
                    <th style="text-align: center; border: solid 1px black;">
                        {{$lote->multiplicador}}
                    </th>
                    <th style="text-align: left; border: solid 1px black;">
                        R$
                    </th>
                </tr>
                </thead>
            </table>
            <table style="width: 100%; border: solid 1px black">
                <thead>
                <tr>
                    <th style="text-align: left;">
                        Vendedor
                    </th>
                    <th style="text-align: left;">
                        Descrição do Lote
                    </th>
                </tr>
                <tr>
                    <th style="text-align: left;">
                        {{ $lote->vendedores()->pluck('nome')->implode(',') }}
                    </th>
                    <th style="text-align: left;">
                        @php
                            $generos = '';
                            foreach ($lote->itens()->pluck('genero') as $index => $genero)
                            {
                                if($index > 0) {
                                    $generos .= ' / ';
                                }
                                $generos .= $genero == 1? 'M' : 'F';
                            }
                        @endphp
                        {{$generos}} - {{ $lote->descricao }}
                    </th>
                </tr>
                </thead>
            </table>
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 10%; text-align: left; border:none">
                        Comprador
                    </td>
                    <td style="width: 40%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        Pisteiro
                    </td>
                    <td style="width: 40%; border-bottom: solid 1px black;">

                    </td>
                </tr>
                </tbody>
            </table>
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 10%; text-align: left; border:none">
                        Nome
                    </td>
                    <td style="width: 40%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        Endereço
                    </td>
                    <td style="width: 40%; border-bottom: solid 1px black;">

                    </td>
                </tr>
                </tbody>
            </table>
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 10%; text-align: left; border:none">
                        Bairro
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        Cidade
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        UF
                    </td>
                    <td style="width: 20%; border-bottom: solid 1px black;">

                    </td>
                </tr>
                <tr>
                    <td style="width: 10%; text-align: left; border:none">
                        CEP
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        I.E.
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        CPF/CNPJ
                    </td>
                    <td style="width: 20%; border-bottom: solid 1px black;">

                    </td>
                </tr>
                </tbody>
            </table>
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 10%; text-align: left; border:none">
                        Fones
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">
                        Email
                    </td>
                    <td style="width: 25%; border-bottom: solid 1px black;">

                    </td>
                    <td style="width: 10%; text-align: right; border:none">

                    </td>
                    <td style="width: 20%; border:none">

                    </td>
                </tr>
                </tbody>
            </table>
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="text-align: left; border:none">
                        Observações
                    </td>
                </tr>
                <tr style="height: 80px;">
                    <td style="text-align: left; border:solid 1px black; height: 60px">

                    </td>
                </tr>
                </tbody>
            </table>
            <hr class="mt-2 mb-2" style="border: dashed 1px black;">
        @endforeach

        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    </div>
@endforeach
