<div class="mt-2">
    {!! $chartsLotePrelancePercentualBuild->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartsLotePrelancePercentualBuildScripts !!}
    @endpush
</div>