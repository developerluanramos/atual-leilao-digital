@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('cliente.edit', $cliente) }}
@endsection

@section('title', 'Edição Cliente')

<x-layouts.headers.edit-header :title="$cliente->uuid.' - '.$cliente->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('cliente.update', $cliente->uuid)}}" method="POST">
    @method('PUT')
    @include('app.cliente.partials.form', ["cliente" => $cliente])
</form>

<div class="mt-4">
    <livewire:components.inputs.multi-file-upload-component modelType="Cliente" modelUuid="{{ $cliente->uuid }}" />
</div>

@endsection
