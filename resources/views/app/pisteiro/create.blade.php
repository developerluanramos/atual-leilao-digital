@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('pisteiro.create') }}
@endsection

@section('title', 'Novo Pisteiro')

<x-layouts.headers.create-header :title="'Novo Pisteiro'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('cargo.store') }}" method="POST">
    @csrf
    @include('app.pisteiro.partials.form')
</form>

@endsection
