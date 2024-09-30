@extends('app.layouts.app')

@section('title', 'Novo Plano de Pagamento')

<x-layouts.headers.create-header :title="'Novo Plano de Pagamento'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('plano-pagamento.store') }}" method="POST">
    @csrf
    @include('app.plano-pagamento.partials.form')
</form>

@endsection
