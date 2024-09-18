@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('leiloeiro.create') }}
@endsection

@section('title', 'Novo Leiloeiro')

<x-layouts.headers.create-header :title="'Novo Leiloeiro'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('leiloeiro.store') }}" method="POST">
    @csrf
    @include('app.leiloeiro.partials.form')
</form>

@endsection
