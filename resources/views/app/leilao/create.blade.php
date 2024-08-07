@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor.create') }}
@endsection

@section('title', 'Novo Leilão')

<x-layouts.headers.create-header :title="'Novo Leilão'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('leilao.store') }}" method="POST">
    @csrf
    @include('app.leilao.partials.form')
</form>

@endsection

