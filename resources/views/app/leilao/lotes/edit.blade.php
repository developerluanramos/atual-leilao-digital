@extends('app.layouts.app')

@section('title', 'Edição Lote')

<x-layouts.headers.edit-header :title="$lote->uuid.' - '.$lote->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('leilao.lote.update', ['uuid' => $uuid, 'loteUuid' => $loteUuid])}}" method="POST">
    @method('PUT')
    @include('app.leilao.lotes.partials.form', ["lote" => $lote])
</form>

@endsection
