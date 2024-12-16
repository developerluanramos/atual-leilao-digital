<style>
    pre {
        white-space: pre-wrap;       /* Since CSS 2.1 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-wrap;      /* Opera 4-6 */
        white-space: -o-pre-wrap;    /* Opera 7 */
        word-wrap: break-word;       /* Internet Explorer 5.5+ */
    }
</style>
@extends('app.layouts.app')

{{--@section('breadcrumb')--}}
{{--    {{ Breadcrumbs::render('setor') }}--}}
{{--@endsection--}}

@section('title', 'Visualizar Leilão')

<x-layouts.headers.create-header :title="$leilao->descricao"/>

@section('content')
    @include('components.alerts.form-success')
    <div class="border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                @if($aba === 'dados-gerais')
                    <a href="{{route('leilao.show', ['uuid' => $leilao->uuid, 'aba' => 'dados-gerais'])}}" class="inline-flex items-center justify-center p-4 border-b-2 text-blue-600 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group">
                        <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>Dashboard
                    </a>
                @else
                    <a href="{{route('leilao.show', ['uuid' => $leilao->uuid, 'aba' => 'dados-gerais'])}}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                        <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>Dashboard
                    </a>
                @endif
            </li>
            <li class="me-2">
                @if($aba === 'lotes')
                    <a href="{{route('leilao.lote.index', ['uuid' => $leilao->uuid, 'aba' => 'lotes'])}}"  class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                        <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>Lotes
                    </a>
                @else
                    <a href="{{route('leilao.lote.index', ['uuid' => $leilao->uuid, 'aba' => 'lotes'])}}"  class="inline-flex items-center justify-center p-4 text-grey-600 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group" aria-current="page">
                        <svg class="w-4 h-4 me-2 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>Lotes
                    </a>
                @endif
            </li>
            <li class="me-2">
                @if($aba === 'contratos')
                    <a href="{{route('leilao.show', ['uuid' => $leilao->uuid, 'aba' => 'contratos'])}}"   class="inline-flex items-center justify-center p-4 border-b-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group">
                        <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                        </svg>Contratos
                    </a>
                @else
                    <a href="{{route('leilao.show', ['uuid' => $leilao->uuid, 'aba' => 'contratos'])}}"   class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                        <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                        </svg>Contratos
                    </a>
                @endif
            </li>
            <li class="me-2">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Mapas <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lote a Lote</a>
                        </li>
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <br>
    @if($aba === 'dados-gerais')
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div id="chart-leilao-lote-conclusao" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @livewire('components.app.charts.leilao-lote-conclusao', [$leilao])
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div id="leilao-compra-prelance" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @livewire('components.app.charts.leilao-compra-prelance', [$leilao])
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div id="chart-leilao-lote-conclusao" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @livewire('components.app.charts.leilao-lote-conclusao', [$leilao])
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div id="leilao-compra-prelance" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @livewire('components.app.charts.leilao-compra-prelance', [$leilao])
                </div>
            </div>
        </div>
        
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        Valor Total
                    </h5>
                    <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'lg'"
                    :value="$leilao->valor_total" />
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">                     
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        C. Comprador
                    </h5>
                    <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'lg'"
                    :value="$leilao->valor_comissao_compra" />
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                         
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        C. Vendedor 
                    </h5>
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_comissao_venda" />
                </div>
            </div>
            <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Média</h5>
                    </a>
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'lg'"
                        :value="$leilao->valor_total / count($leilao->lotes)" />
                </div>
            </div>
        </div>
        
        <div id="chart-leilao-valor-atingido" class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @livewire('components.app.charts.leilao-valor-atingido', [$leilao])
        </div>
        <div class="p-3 mt-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3>Médias por comprador</h3>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($mediaCompras as $media)
                    <li class="py-3 sm:py-4 cursor-pointer pointer">
                        <div class="flex items-center w-full">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($media->nome, 0, 2)}}</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                {{$media->nome}}
                            </div>
                            <div class="inline-flex items-right items-end text-base font-semibold text-gray-900 dark:text-white">
                                <x-layouts.badges.info-money
                                    :convert="false"
                                    :value="number_format($media->media_compras, 2, '.', '')"
                                ></x-layouts.badges.info-money>
                            </div>
                        </div>
                    </li>
                @empty
                    <small>Nenhuma compra realizada pra renderizar as médias por cliente</small>
                @endforelse
            </ul>
        </div>
    @endif
        
    @if($aba === 'lotes')
        @if($action == 'index')
            <div class="">
                <b class="uppercase">{{$lotes->total()}} Lotes</b> |
                <x-layouts.buttons.action-button
                    text="Criar"
                    action="criar"
                    color="success"
                    :route="route('leilao.lote.create', ['uuid' => $leilao->uuid])"/>
            </div>
            @include('app.leilao.lotes.index', ['leilao' => $leilao, 'lotes' => $lotes])
        @elseif($action == 'create')
            @include('app.leilao.lotes.create', ['leilao' => $leilao, 'formData' => $formData])
        @elseif($action == 'show')
            @include('app.leilao.lotes.show', ['leilao' => $leilao, 'lote' => $lote])
        @endif
    @endif

    @if($aba === 'contratos')
    <div class="flow-root">
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Contratos</h5>
        </div>
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($leilao->compras as $comprador)
                <li class="py-3 sm:py-4 cursor-pointer pointer">
                    <div class="flex items-center w-full">
                        <div class="flex-shrink-0">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($comprador->cliente->nome, 0, 2)}}</span>
                            </div>
                            </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$comprador->cliente->nome}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$comprador->cliente->email}}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{-- <x-layouts.badges.info-money
                                :convert="false"
                                :value="$compra->valor"
                            ></x-layouts.badges.info-money> --}}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection
