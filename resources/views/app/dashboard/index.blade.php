@extends('app.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-2">
        <div class="max-w-4xl w-full">
            <img
                src="{{ asset('atual_leiloes_logo.svg') }}"
                alt="Logo da Empresa"
                class="w-full h-auto max-h-[500px] object-contain mx-auto opacity-65"
            >
        </div>
    </div>
@endsection
