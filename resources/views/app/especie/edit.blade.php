@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('especie.edit', $especie) }}
@endsection

@section('title', 'Edição Especie')

<x-layouts.headers.edit-header :title="$especie->uuid.' - '.$especie->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('especie.update', $especie->uuid)}}" method="POST">
    @method('PUT')
    @include('app.especie.partials.form', ["especie" => $especie])
</form>

@endsection
