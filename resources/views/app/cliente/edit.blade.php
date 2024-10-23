@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('plano-pagamento.edit', $planoPagamento) }}
@endsection

@section('title', 'Editar Plano de Pagamento')

<x-layouts.headers.create-header :title="$cliente->uuid. ' - ' .$cliente->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('cliente.update', $cliente->uuid)}}" method="POST">
    @method('PUT')
    @include('app.cliente.partials.form', ["cliente" => $cliente])
</form>

@endsection
