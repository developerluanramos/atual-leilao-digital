@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('leiloeiro.edit', $leiloeiro) }}
@endsection

@section('title', 'Edição Leiloeiro')

<x-layouts.headers.edit-header :title="$leiloeiro->uuid.' - '.$leiloeiro->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('leiloeiro.update', $leiloeiro->uuid)}}" method="POST">
    @method('PUT')
    @include('app.leiloeiro.partials.form', ["leiloeiro" => $leiloeiro])
</form>

@endsection