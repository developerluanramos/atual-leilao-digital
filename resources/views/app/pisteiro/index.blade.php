@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('pisteiro') }}
@endsection

@section('title', 'Pisteiros')

@section('content')

<x-layouts.headers.list-header :count="$pisteiros->total()" :title="'Pisteiros'" :route="'cargo/create'"/>

@include('components.alerts.form-success')

@include('app.pisteiro.partials.filters', [
    "cargos" => $pisteiros,
    "filters" => $filters
])


@include('app.pisteiro.partials.list', [
    "cargos" => $pisteiros,
    "filters" => $filters
])

@endsection
