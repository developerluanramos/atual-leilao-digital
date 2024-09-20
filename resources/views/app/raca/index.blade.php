@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('raca') }}
@endsection

@section('title', 'Racas')

@section('content')

<x-layouts.headers.list-header :count="$racas->total()" :title="'Racas'" :route="'raca/create'"/>

@include('components.alerts.form-success')

@include('app.raca.partials.filters', [
    "racas" => $racas,
    "filters" => $filters
])


@include('app.raca.partials.list', [
    "racas" => $racas,
    "filters" => $filters
])

@endsection
