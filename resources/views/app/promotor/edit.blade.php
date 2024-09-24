@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('promotor.edit', $promotor) }}
@endsection

@section('title', 'Edição Promotor')

<x-layouts.headers.edit-header :title="$promotor->uuid.' - '.$promotor->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('pisteiro.update', $promotor->uuid)}}" method="POST">
    @method('PUT')
    @include('app.promotor.partials.form', ["promotor" => $promotor])
</form>

@endsection
