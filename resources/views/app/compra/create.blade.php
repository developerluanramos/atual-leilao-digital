@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('setor.create') }}
@endsection

@section('title', 'Nova Compra')

<x-layouts.headers.create-header :title="'Nova Compra'"/>

@section('content')

    @include('components.alerts.form-errors')


    <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span>Leilão</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-2">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <span>Lote</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                <small>Plano Pagamento: <b>{{ $formData['lote']['plano_pagamento']['descricao'] }}</b></small>
                <ul>
                    @foreach($formData['lote']['plano_pagamento']['condicoes_pagamento'] as $condicaoPagamento)
                        <li>
                            <p>
                                <small>Parcelas: </small><b>{{$condicaoPagamento['qtd_parcelas']}}</b> |
                                <small>Repetições: </small><b>{{$condicaoPagamento['repeticoes']}}</b> |
                                <small>Comissão Venda: </small><b>{{$condicaoPagamento['percentual_comissao_vendedor']}} %</b> |
                                <small>Comissão Compra: </small><b>{{$condicaoPagamento['percentual_comissao_comprador']}} %</b>
                            </p>
                        </li>
                    @endforeach
                </ul>
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($formData['lote']['itens'] as $index => $item)
                        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{$item['descricao']}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <small>Gênero: </small> {{ \App\Enums\GeneroLoteItemEnum::getDescription((int)$item['genero']) }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <small>Espécie: </small> {{$item['especie']['nome']}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <small>Raça: </small> {{$item['raca']['nome']}}
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <small>Valor estimado: </small> <x-layouts.badges.info-money
                                                textLength="sm"
                                                :value="$item['valor_estimado']"
                                            />
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </div>
                    @empty
                        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                            Nenhum registro adicionado até o momento, <b>preencha o formulário</b> e clique em <b>adicionar</b> para incluir itens no lote
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <hr>
{{--        <h2 id="accordion-collapse-heading-3">--}}
{{--            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">--}}
{{--                <span>What are the differences between Flowbite and Tailwind UI?</span>--}}
{{--                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">--}}
{{--                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </h2>--}}
{{--        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">--}}
{{--            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">--}}
{{--                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>--}}
{{--                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>--}}
{{--                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>--}}
{{--                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">--}}
{{--                    <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>--}}
{{--                    <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <form method="POST">

    </form>
@endsection
