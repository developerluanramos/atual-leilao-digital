<div class="mt-2">
    {!! $lotePrelanceRadialBuild->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $lotePrelanceRadialBuildScripts !!}
    @endpush
</div>