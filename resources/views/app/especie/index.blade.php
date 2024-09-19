@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('especie') }}
@endsection

@section('title', 'Especies')

@section('content')

<x-layouts.headers.list-header :count="$especies->total()" :title="'Especies'" :route="'especie/create'"/>

@include('components.alerts.form-success')

@include('app.especie.partials.filters', [
    "especies" => $especies,
    "filters" => $filters
])


@include('app.especie.partials.list', [
    "especies" => $especies,
    "filters" => $filters
])

@endsection
