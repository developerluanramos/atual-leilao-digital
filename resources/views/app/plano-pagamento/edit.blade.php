@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('plano-pagamento.edit', $planoPagamento) }}
@endsection

@section('title', 'Editar Plano de Pagamento')

<x-layouts.headers.create-header :title="$planoPagamento->uuid. ' - ' .$planoPagamento->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('plano-pagamento.update', $planoPagamento->uuid) }}" method="POST">
    @method('PUT')
    @include('app.plano-pagamento.partials.form', ["plano_pagamento" => $planoPagamento])
</form>

@endsection
