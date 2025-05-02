@extends('app.layouts.app')

@section('title', 'Leilões')

@section('content')
<x-layouts.headers.list-header :count="$leiloes->total()" :title="'Leilões'" :route="'leilao/create'"/>

@include('components.alerts.form-success')

@include('app.leilao.partials.filters', [
    "leiloes" => $leiloes,
    "filters" => $filters ?? null
])

@include('app.leilao.partials.list', [
    "leiloes" => $leiloes,
    "filters" => $filters ?? null
])

@endsection
