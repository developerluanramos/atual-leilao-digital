<div>
    <div>
        <div class="mt-3">
            {!! $chart->container() !!}
        </div>
        <script src="{{ $chart->cdn() }}"></script>
        
        {{ $chart->script() }}
    </div>
</div>
