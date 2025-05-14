{{--@extends('app.mapa.default-header', ['titulo' => "Contratos Comprador", 'identificador' => 'contratos-comprador'])--}}

{{--@section('content-mapa-contratos-comprador')--}}
{{--    <h1>Contratos</h1>--}}
{{--@endsection--}}

@forelse($compras as $compra)
    <p>{{ $compra->uuid }}</p>
    @include('app.promissoria.vendedor', ['compra' => $compra])
    <div class="page-break"></div>
@empty
    <h1>Nenhuma compra realizada</h1>
@endforelse
