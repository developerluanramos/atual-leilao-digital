<div>
    {{-- Chart container --}}
    {!! $chartLeilaoGenero->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>
