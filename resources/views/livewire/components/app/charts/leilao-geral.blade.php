<div>
    {{-- Chart container --}}
    {!! $chartLeilaoGeral->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>
