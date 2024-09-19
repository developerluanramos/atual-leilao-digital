@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('especie.create') }}
@endsection

@section('title', 'Nova Especie')

<x-layouts.headers.create-header :title="'Nova Especie'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('especie.store') }}" method="POST">
    @csrf
    @include('app.especie.partials.form')
</form>

@endsection
