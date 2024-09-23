@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('promotor.create') }}
@endsection

@section('title', 'Novo Promotor')

<x-layouts.headers.create-header :title="'Novo Promotor'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('pisteiro.store') }}" method="POST">
    @csrf
    @include('app.promotor.partials.form')
</form>

@endsection
