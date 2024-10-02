@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('plano-pagamento.create') }}
@endsection

@section('title', 'Novo Plano de Pagamento')

<x-layouts.headers.create-header :title="'Novo Plano de Pagamento'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('plano-pagamento.store') }}" method="POST">
    @csrf
    @include('app.plano-pagamento.partials.form')
</form>

@endsection
