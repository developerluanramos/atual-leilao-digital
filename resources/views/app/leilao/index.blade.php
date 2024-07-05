@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor') }}
@endsection

@section('title', 'Fornecedores')

@section('content')

<x-layouts.headers.list-header :count="$setores->total()" :title="'Setores'" :route="'setor/create'"/>

@include('components.alerts.form-success')

@include('app.setor.partials.filters', [
    "setores" => $setores,
    "filters" => $filters
])

@include('app.setor.partials.list', [
    "setores" => $setores,
    "filters" => $filters
])

@endsection
