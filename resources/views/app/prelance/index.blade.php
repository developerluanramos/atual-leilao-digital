@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor') }}
@endsection

@section('title', 'Pré-lances')

@section('content')
    @livewire('components.app.pre-lance-visao-geral', [$leilao])
@endsection
