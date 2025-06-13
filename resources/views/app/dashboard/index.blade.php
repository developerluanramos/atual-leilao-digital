@extends('app.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 gap-4 p-4">
        <!-- Card 1: Quantidade de Leilões -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-indigo-100 dark:bg-indigo-900">
                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Qtd. de Leilões</p>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">
                            {{$dashboardData['quantitativos']['leilao']}}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    +12%
                </span>
                </div>
            </div>
        </div>

        <!-- Card 2: Quantidade de Lotes -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lotes</p>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">
                            {{$dashboardData['quantitativos']['lote']}}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    +8%
                </span>
                </div>
            </div>
        </div>

        <!-- Card 3: Quantidade de Itens -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-green-100 dark:bg-green-900">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Itens</p>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">
                            {{$dashboardData['quantitativos']['item']}}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    +23%
                </span>
                </div>
            </div>
        </div>

        <!-- Card 4: Quantidade de Clientes -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-purple-100 dark:bg-purple-900">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Clientes</p>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">
                            {{$dashboardData['quantitativos']['cliente']}}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    +15%
                </span>
                </div>
            </div>
        </div>

{{--        <!-- Card 5: Total em Comissão -->--}}
{{--        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">--}}
{{--            <div class="p-5">--}}
{{--                <div class="flex items-center">--}}
{{--                    <div class="p-2 rounded-full bg-yellow-100 dark:bg-yellow-900">--}}
{{--                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="ml-3 overflow-hidden">--}}
{{--                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Comissão</p>--}}
{{--                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">R$ 28.450,00</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mt-3">--}}
{{--                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">--}}
{{--                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>--}}
{{--                    +18%--}}
{{--                </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Card 6: Total Vendido -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-red-100 dark:bg-red-900">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3 overflow-hidden">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Vendido</p>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white whitespace-nowrap overflow-visible">
                            {{Akaunting\Money\Money::BRL($dashboardData['quantitativos']['vendido'], false)}}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                <span class="inline-flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    +32%
                </span>
                </div>
            </div>
        </div>
    </div>
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
