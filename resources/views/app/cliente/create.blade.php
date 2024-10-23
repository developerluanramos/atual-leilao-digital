@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('cliente.create') }}
@endsection

@section('title', 'Novo Cliente')

<x-layouts.headers.create-header :title="'Novo Cliente'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('cliente.store') }}" method="POST">
    @csrf
    @include('app.cliente.partials.form')
</form>

@endsection
