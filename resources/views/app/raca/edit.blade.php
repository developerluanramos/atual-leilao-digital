@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('raca.edit', $raca) }}
@endsection

@section('title', 'Edição Raça')

<x-layouts.headers.edit-header :title="$raca->uuid.' - '.$raca->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('cargo.update', $raca->uuid)}}" method="POST">
    @method('PUT')
    @include('app.raca.partials.form', ["raca" => $raca])
</form>

@endsection
