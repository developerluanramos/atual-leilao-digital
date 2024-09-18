@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('pisteiro.edit', $pisteiro) }}
@endsection

@section('title', 'Edição Pisteiro')

<x-layouts.headers.edit-header :title="$pisteiro->uuid.' - '.$pisteiro->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('cargo.update', $pisteiro->uuid)}}" method="POST">
    @method('PUT')
    @include('app.pisteiro.partials.form', ["pisteiro" => $pisteiro])
</form>

@endsection
