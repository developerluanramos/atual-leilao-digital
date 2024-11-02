@section('title', 'Novo Lote')

<x-layouts.headers.create-header :title="'Novo Cargo'"/>

@include('components.alerts.form-errors')

<form action="{{ route('leilao.lote.store', ['uuid' => $leilao->uuid]) }}" method="POST">
    @csrf
    @include('app.leilao.lotes.partials.form')
</form>
