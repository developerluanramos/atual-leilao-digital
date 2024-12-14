<div class="mt-2">
    {!! $chartLotePrelanceValorAtingido->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartLotePrelanceValorAtingidoScripts !!}
    @endpush
</div>