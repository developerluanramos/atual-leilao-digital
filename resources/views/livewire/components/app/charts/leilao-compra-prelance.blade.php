<div>
    {{-- Chart container --}}
    {!! $chartLeilaoCompraPrelance->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>