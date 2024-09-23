@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('promotor') }}
@endsection

@section('title', 'Promotores')

@section('content')

<x-layouts.headers.list-header :count="$promotores->total()" :title="'Promotores'" :route="'pisteiro/create'"/>

@include('components.alerts.form-success')

@include('app.promotor.partials.filters', [
    "promotores" => $promotores,
    "filters" => $filters
])


@include('app.promotor.partials.list', [
    "promotores" => $promotores,
    "filters" => $filters
])

@endsection
