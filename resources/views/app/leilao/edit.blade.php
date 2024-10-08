@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('leilao.edit', $leilao) }}
@endsection

@section('title', 'Edição de Leilão')

<x-layouts.headers.edit-header :title="$leilao->uuid.' - '.$leilao->descricao"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('leilao.update', $leilao->uuid) }}" method="POST">
    @csrf
    @method('PUT')
    @include('app.leilao.partials.form')
</form>

@endsection

