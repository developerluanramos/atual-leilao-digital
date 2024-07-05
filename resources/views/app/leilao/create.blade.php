@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor.create') }}
@endsection

@section('title', 'Novo Setor')

<x-layouts.headers.create-header :title="'Novo Setor'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('setor.store') }}" method="POST">
    @csrf
    @include('app.setor.partials.form')
</form>

@endsection

