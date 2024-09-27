@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('plano-pagamento') }}
@endsection

@section('title', 'Planos de Pagamento')

@section('content')

<x-layouts.headers.list-header :count="$planos_pagamento->total()" :title="'Plano de Pagamento'" :route="'plano-pagamento/create'"/>

@include('components.alerts.form-success')

@include('app.plano-pagamento.partials.filters', [
    "planos_pagamento" => $planos_pagamento,
    "filters" => $filters
])


@include('app.plano-pagamento.partials.list', [
    "planos_pagamento" => $planos_pagamento,
    "filters" => $filters
])

@endsection
