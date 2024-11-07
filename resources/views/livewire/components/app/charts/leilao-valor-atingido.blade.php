
<div id="leilao-valor-atingido">
    <div class="mt-3">
        {!! $chartLeilaoValorAtingido->container() !!}
    </div>
    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScript !!}
    @endpush
</div>
