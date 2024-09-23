@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('pisteiro') }}
@endsection

@section('title', 'Pisteiros')

@section('content')

<x-layouts.headers.list-header :count="$pisteiros->total()" :title="'Pisteiros'" :route="'pisteiro/create'"/>

@include('components.alerts.form-success')

@include('app.pisteiro.partials.filters', [
    "pisteiros" => $pisteiros,
    "filters" => $filters
])


@include('app.pisteiro.partials.list', [
    "pisteiros" => $pisteiros,
    "filters" => $filters
])

@endsection
