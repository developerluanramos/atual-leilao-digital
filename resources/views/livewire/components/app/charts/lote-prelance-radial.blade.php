<div class="mt-2" style="width: 100%; overflow: hidden;">
    {!! $lotePrelanceRadialBuild->container() !!}

    {{-- Chart script --}}
    @push('scripts')
        {!! $lotePrelanceRadialBuildScripts !!}
    @endpush
</div>