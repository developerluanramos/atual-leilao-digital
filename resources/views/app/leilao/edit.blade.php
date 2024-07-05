@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor.edit', $setor) }}
@endsection

@section('title', 'Edição Setor')

<x-layouts.headers.edit-header :title="$setor->uuid.' - '.$setor->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('setor.update', $setor->uuid) }}" method="POST">
    @csrf
    @method('PUT')
    @include('app.setor.partials.form')
</form>

@endsection

