<div>
    {{-- @dd($chart) --}}
    {!! $chart->container() !!}
        {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>
