@extends('app.layouts.app')

<!-- @section('breadcrumb')
    {{ Breadcrumbs::render('cargo.create') }}
@endsection -->

@section('title', 'Novo Leiloeiro')

<x-layouts.headers.create-header :title="'Novo Cargo'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('leiloeiro.store') }}" method="POST">
    @csrf
    @include('app.leiloeiro.partials.form')
</form>

@endsection
