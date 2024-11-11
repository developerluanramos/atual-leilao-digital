<!-- Buyer Section -->
<div class="section">
    <h3>Programação do Pagamento</h3>
    <p>
        Último lance: 
        <strong>
            <x-layouts.badges.info-money
                :convert="false"
                :textLength="'sm'"
                :value="$compra->valor_lance"
            />
        </strong>
        Comprado: 
        <strong>
            <x-layouts.badges.info-percent
                :convert="false"
                :textLength="'sm'"
                :value="$compra->percentual_cota"
            />
        </strong>
        Vendido: 
        <strong>
            <x-layouts.badges.info-percent
                :convert="false"
                :textLength="'sm'"
                :value="$compra->percentual_cota_vendedor"
            />
        </strong>
        A pagar: 
        <strong>
            <x-layouts.badges.info-money
                :convert="false"
                :textLength="'sm'"
                :value="$compra->valor"
            />
        </strong>
    </p>
    <table class="outer-table report-table">
        <tr>
            @for ($i = 0; $i < count($compra->parcelas); $i += 10)
                <td>
                    <table class="inner-table">
                        @for ($j = 0; $j < 10 && ($i + $j) < count($compra->parcelas); $j++)
                            <tr>
                                <td><strong>0{{ $compra->parcelas[$i + $j]['numero'] }}</strong> 
                                    {{date('d/m/Y', strtotime($compra->parcelas[$i + $j]['vencimento_em']))}}
                                    <strong><x-layouts.badges.info-money
                                        :convert="false"
                                        :textLength="'lg'"
                                        :value="$compra->parcelas[$i + $j]['valor']"
                                    /></strong>
                                </td>
                            </tr>
                        @endfor
                    </table>
                </td>
                @if (($i + 10) % 40 == 0)
                    </tr><tr> <!-- Start a new row after every 2 columns -->
                @endif
            @endfor
        </tr>
    </table>
</div>