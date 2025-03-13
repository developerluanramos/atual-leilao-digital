@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor') }}
@endsection

@section('title', 'Pré-lances')

@section('content')
    @if (session()->has('message'))
        <div class="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif
    @livewire('components.app.pre-lance-visao-geral', [$leilao])
@endsection
