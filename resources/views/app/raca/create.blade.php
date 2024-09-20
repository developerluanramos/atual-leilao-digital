@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('raca.create') }}
@endsection

@section('title', 'Novo Cargo')

<x-layouts.headers.create-header :title="'Nova Raça'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('cargo.store') }}" method="POST">
    @csrf
    @include('app.raca.partials.form')
</form>

@endsection
