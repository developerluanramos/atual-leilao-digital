@section('title', 'Novo Cargo')

<x-layouts.headers.create-header :title="'Novo Cargo'"/>

@include('components.alerts.form-errors')

<form action="{{ route('cargo.store') }}" method="POST">
    @csrf
    @include('app.leilao.lotes.partials.form')
</form>
