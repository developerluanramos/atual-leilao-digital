<div>
    {{-- Chart container --}}
    {!! $chartLeilaoEspecie->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>
