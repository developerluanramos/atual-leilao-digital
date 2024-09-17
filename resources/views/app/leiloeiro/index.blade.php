@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('leiloeiro') }}
@endsection

@section('title', 'Leiloeiros')

@section('content')

<x-layouts.headers.list-header :count="$leiloeiros->total()" :title="'Leiloeiros'" :route="'cargo/create'"/>

@include('components.alerts.form-success')

@include('app.leiloeiro.partials.filters', [
    "leiloeiros" => $leiloeiros,
    "filters" => $filters
])


@include('app.leiloeiro.partials.list', [
    "leiloeiros" => $leiloeiros,
    "filters" => $filters
])

@endsection
