<div>
    {{-- Chart container --}}
    {!! $chartLeilaoRaca->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $chartScripts !!}
    @endpush
</div>
