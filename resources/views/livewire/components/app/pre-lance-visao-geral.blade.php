<div>
    <div class="mb-8 border-b border-gray-200 dark:border-gray-700 pb-2">
        <h2 class="text-1xl md:text-1xl font-extrabold text-gray-900 dark:text-white">
        <span class="inline-block">
            <span class="text-indigo-600 dark:text-indigo-400">PRÉ-LANCE</span>
            <span class="mx-2 text-gray-400">/</span>
            VISÃO GERAL
        </span>
        </h2>
    </div>
    <div class="mb-6 w-full px-2">
        <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-3 w-full">
            <!-- Comissão Comprador -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-blue-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">C. Comprador</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-money :convert="true" :textLength="'sm'" :value="$leilao->valor_prelance_comissao_compra" />
                </span>
                </a>
            </li>

            <!-- Comissão Vendedor -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">C. Vendedor</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-money :convert="true" :textLength="'sm'" :value="$leilao->valor_prelance_comissao_venda" />
                </span>
                </a>
            </li>

            <!-- Total Comissão -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-yellow-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">Total Comissão</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-money :convert="true" :textLength="'sm'" :value="$leilao->valor_prelance_comissao_total" />
                </span>
                </a>
            </li>

            <!-- Lotes -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">Lotes</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-number :textLength="'sm'" :value="$leilao->lotes->count()" />
                </span>
                </a>
            </li>

            <!-- Vendedores -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-purple-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">Vendedores</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-number :textLength="'sm'" :value="count($vendedores)" />
                </span>
                </a>
            </li>

            <!-- Participantes -->
            <li class="w-full">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-md hover:shadow-lg h-full">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-pink-500 opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">Participantes</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-number :textLength="'sm'" :value="$leilao->clientes()?->count() ?? 0" />
                </span>
                </a>
            </li>

            <!-- Total Pré-lance (Destaque) -->
            <li class="w-full col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-1">
                <a href="#" class="relative group flex flex-col items-center p-3 rounded-xl transition-all duration-200 bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg text-white h-full justify-center">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
{{--                    <span class="absolute inline-flex h-full w-full rounded-full bg-white opacity-75 animate-pulse"></span>--}}
{{--                    <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>--}}
                </span>
                    <span class="text-xs font-medium uppercase tracking-wider">Total Pré-lance</span>
                    <span class="text-lg font-bold mt-1">
                    <x-layouts.badges.info-money :convert="true" :color="'white'" :textLength="'lg'" :value="$leilao->lotes->sum('valor_prelance')" />
                </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="flex" style="margin-left: 4px">
        <button onclick="copiarLotesGeralResumido({{json_encode($leilao->toArray())}}, {{json_encode($leilao->lotes->toArray())}})" type="button" class="mr-2 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
            <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
            </svg>
            Descritivo de Lotes
        </button>
        <button onclick="copiarLotesGeralAnalitico({{json_encode($leilao->toArray())}}, {{json_encode($leilao->lotes->toArray())}})" type="button" class="mr-2 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
            <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
            </svg>
            Descritivo do Pré-lance
        </button>
        <a target="_blank" href="{{route('leilao.mapa.prelance.resumo-lote', ['uuid' => $leilao->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
            <svg class="w-4 h-4 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
            </svg>

            Lotes
        </a>

        <a style="" target="_blank" href="{{route('leilao.mapa.prelance.resumo-cliente', ['uuid' => $leilao->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
            <svg class="w-4 h-4 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
            </svg>
            Clientes geral
        </a>

        <a style="" target="_blank" href="{{route('leilao.mapa.prelance.participantes', ['uuid' => $leilao->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
            <svg class="w-4 h-4 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
            </svg>
            Clientes resumido
        </a>

        <a target="_blank" href="{{route('leilao.mapa.prelance.vendedor', ['uuid' => $leilao->uuid, 'vendedores' => json_encode($vendedores->pluck('uuid'))])}}" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
            <svg class="w-4 h-4 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
            </svg>
            Vendedores
        </a>
        <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid])}}" style="float: right" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg active dark:bg-blue-600" aria-current="page">
            <svg class="w-4 h-4 text-white mr-2 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
            </svg>

            Novo lance
        </a>
        <a href="{{route('leilao.show', ['uuid' => $leilao->uuid])}}" style="float: right" class="flex mr-2 px-3 py-2 text-xs font-medium">
            <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.4 6.763c-.251.1-.383.196-.422.235L6.564 5.584l2.737-2.737c1.113-1.113 3.053-1.097 4.337.187l1.159 1.159a1 1 0 0 1 1.39.022l4.105 4.105a1 1 0 0 1 .023 1.39l1.345 1.346a1 1 0 0 1 0 1.415l-2.052 2.052a1 1 0 0 1-1.414 0l-1.346-1.346a1 1 0 0 1-1.323.039L11.29 8.983a1 1 0 0 1 .04-1.324l-.849-.848c-.18-.18-.606-.322-1.258-.25a3.271 3.271 0 0 0-.824.202Zm1.519 3.675L3.828 16.53a1 1 0 0 0 0 1.414l2.736 2.737a1 1 0 0 0 1.414 0l6.091-6.091-4.15-4.15Z"/>
            </svg>
            Ir para o leilão
        </a>
    </div>
   <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-12/12 md:mb-0">
         <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
               <li class="me-2" role="presentation">
                  <button
                     class="inline-flex items-center p-4 border-b-2 rounded-t-lg dark:text-blue-500"
                     id="profile-tab"
                     data-tabs-target="#profile"
                     type="button"
                     role="tab"
                     aria-controls="profile"
                     aria-selected="false">
                     Painel principal ({{$leilao->lotes->count()}} lotes)
                  </button>
               </li>
               {{-- <li class="me-2" role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="settings-tab"
                     data-tabs-target="#settings"
                     type="button"
                     role="tab"
                     aria-controls="settings"
                     aria-selected="false">
                     Lotes
                  </button>
               </li> --}}
               {{-- <li class="me-2" role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="dashboard-tab"
                     data-tabs-target="#dashboard"
                     type="button"
                     role="tab"
                     aria-controls="dashboard"
                     aria-selected="false">
                     Gastos por cliente
                  </button>
               </li> --}}
               <li class="me-2" role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="clients-prelance-tab"
                     data-tabs-target="#clients-prelance"
                     type="button"
                     role="tab"
                     aria-controls="clients-prelance"
                     aria-selected="false">
                     Participantes ({{$leilao->clientes->count()}})
                  </button>
               </li>
               <li role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="vendedores-tab"
                     data-tabs-target="#vendedores"
                     type="button"
                     role="tab"
                     aria-controls="vendedores"
                     aria-selected="false">
                     Vendedores ({{$vendedores->count()}})
                  </button>
               </li>
               <li role="presentation">
                  <button
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                     id="graficos-tab"
                     data-tabs-target="#graficos"
                     type="button"
                     role="tab"
                     aria-controls="graficos"
                     aria-selected="false">
                     Gráficos
                  </button>
               </li>
{{--               <li role="presentation">--}}
{{--                  <button--}}
{{--                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"--}}
{{--                     id="configuracoes-prelance-tab"--}}
{{--                     data-tabs-target="#configuracoes-prelance"--}}
{{--                     type="button"--}}
{{--                     role="tab"--}}
{{--                     aria-controls="configuracoes-prelance"--}}
{{--                     aria-selected="false">--}}
{{--                     Configurações--}}
{{--                  </button>--}}
{{--               </li>--}}
            </ul>
         </div>
         <div id="default-tab-content">
            <!--
            ------------------------------------------
            LOTES
            ------------------------------------------
            -->
            <div class="hidden p-2 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <div class="space-y-2 lg:grid lg:grid-cols-6 pr-2 sm:gap-3 xl:gap-10 lg:space-y-0">
                  @foreach($leilao->lotes->sortBy('numero') as $index => $lote)
                     <div data-modal-target="{{$lote->uuid}}" data-modal-toggle="{{$lote->uuid}}"
                        style="cursor: pointer; background-color: {{ $lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc' }}"
                        class="flex flex-col p-4 mx-auto w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow-lg shadow-blue-500/50 hover:bg-gradient-to-br dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                           {{ $lote->numero }}
                        </h5>
                        <p>
                           <x-layouts.badges.info-money
                              :convert="false"
                              :textLength="'md'"
                              :value="$lote->prelance_vencedor()?->valor ?? 0" />
                        </p>
                     </div>
                        <x-layouts.modals.simple-modal
                           :tamanho="8"
                           :identificador="$lote->uuid"
                           :sessao="$lote->uuid"
                           :titulo="'Lote '.$lote->numero.' - ' . $lote->descricao">
                           @section($lote->uuid)
                           <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              <svg class="w-6 h-6 text-white mr-2 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                 <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                               </svg>
                              Novo lance
                           </a>
                           <small>
                              Valor atingido
                              <x-layouts.badges.info-money
                                 :convert="true"
                                 :textLength="'md'"
                                 :value="$lote->valor_prelance" />
                              &nbsp
                              x
                              &nbsp
                              Valor estimado
                              <x-layouts.badges.info-money
                                 :convert="false"
                                 :textLength="'md'"
                                 :value="$lote->valor_estimado" />
                           </small>
                           @livewire('components.app.lote-barra-progresso', [$lote, 'prelance'])
                           <small>
                              <x-layouts.badges.info-percent
                                 :convert="false"
                                 :textLength="'md'"
                                 :value="$lote->valor_prelance_percentual_valor_estimado" />
                           </small>
                           <div class="flex w-full md:w-12/12 mb-6 md:mb-0">
                              <div class="space-y-12 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-money
                                          :convert="false"
                                          :textLength="'xs'"
                                          :value="$lote->valor_prelance_comissao_compra" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-money
                                          :convert="false"
                                          :textLength="'xs'"
                                          :value="$lote->valor_prelance_comissao_venda" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-number
                                          :textLength="'xs'"
                                          :value="$lote->prelances->count()" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total prelances</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-money
                                          :convert="true"
                                          :textLength="'xs'"
                                          :value="$lote->valor_prelance_comissao_total" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Comissão</p>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div class="flex">
                              <a style="width: 150px" target="_blank" href="{{route('leilao.mapa.prelance.resumo-lote-unico', ['uuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                  </svg>
                                  Resumido
                              </a>
                               <button onclick="copiarLoteUnico('{{$leilao->descricao}}', {{json_encode($lote)}}, {{json_encode($lote->prelances()?->get()?->toArray())}})" type="button" class="ml-2 px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
                                   <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                       <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                   </svg>
                                   Resumido
                               </button>
                           </div>
                           <div class="relative overflow-x-auto">
                              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                       <th scope="col" class="px-6 py-3">

                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Cliente
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Data
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Lance
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Comissão C.
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Comissão V.
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Total
                                       </th>
                                       <th scope="col" class="px-6 py-3">
                                          Status
                                       </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @forelse($lote->prelances()->get()->reverse() as $index => $lance)
                                    <tr>
                                       <td class="px-3 py-2">
                                          <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-5 h-5 mt-1 me-3 rounded-full"></span>
                                       </td>
                                       <td class="px-3 py-2">
                                          @foreach($lance->clientes()->get() as $index => $cliente)
                                             <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                                                 {{$cliente->nome}}
                                             </h6>
                                          @endforeach
                                       </td>
                                       <td class="px-3 py-2"><time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $lance->created_at }}</time></td>
                                       <td class="px-3 py-2">
                                          <x-layouts.badges.info-money
                                          :convert="false"
                                          :textLength="'xs'"
                                          :color="'purple'"
                                          :value="$lance->valor"
                                          />
                                       </td>
                                       <td class="px-3 py-2" style="text-align: right">
                                             <x-layouts.badges.info-percent
                                             :convert="false"
                                             :textLength="'xs'"
                                             :value="$lance->prelance_config->percentual_comissao_comprador"
                                          />
                                          <strong>
                                             <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="number_format($lance->valor_comissao_compra, 2, '.', '')"
                                             />
                                          </strong>
                                       </td>
                                       <td class="px-3 py-2" style="text-align: right">
                                          <x-layouts.badges.info-percent
                                             :convert="false"
                                             :textLength="'xs'"
                                             :value="$lance->prelance_config->percentual_comissao_vendedor"
                                          />
                                          <strong>
                                             <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="number_format($lance->valor_comissao_venda, 2, '.', '')"
                                             />
                                          </strong>
                                       </td>
                                       <td class="px-3 py-2" style="text-align: right">
                                          <x-layouts.badges.info-money
                                             :convert="false"
                                             :color="'purple'"
                                             :textLength="'sm'"
                                             :value="number_format($lance->lote->valor_final_prelance, 2, '.', '')"
                                          />
                                       </td>
                                       <td class="px-3 py-2" style="text-align: right">
                                          @if($lance->uuid === $lance->lote->prelance_vencedor()->uuid)
                                             <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                                Vencendo
                                             </span>
                                          @else
                                             <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                Superado
                                             </span>
                                          @endif
                                       </td>
                                        <td class="px-3 py-2" style="text-align: right">
                                            @if($lance->uuid === $lance->lote->prelance_vencedor()->uuid)
                                                <button onclick="copiarVencendo('{{$leilao->descricao}}', {{json_encode($lance)}})" type="button" class="ml-2 px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
                                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                                        <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                                    </svg>
                                                </button>
                                            @else
                                                <button onclick="copiarSuperado('{{$leilao->descricao}}', {{json_encode($lance)}}, {{json_encode($lance->lote->prelance_vencedor())}})" type="button" class="ml-2 px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
                                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                                        <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                       <tr>
                                          Nenhum lance registrado até o momento
                                       </tr>
                                    @endforelse
                                 </tbody>
                              </table>
                           </div>
                           @endsection
                        </x-layouts.modals.simple-modal>
                        @endforeach
                     </div>
            </div>




            <!--
            ------------------------------------------
            RESUMO GASTO POR CLIENTE
            ------------------------------------------
            -->
            {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
               <div class="flow-root">
                  <a style="width: 150px" target="_blank" href="{{route('leilao.mapa.prelance.resumo-cliente', ['uuid' => $leilao->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                     <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                      </svg>
                      Relatório geral
                  </a>
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                     @foreach($clientesVencedores as $cliente)
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center">
                              <div class="flex-shrink-0">
                                 <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($cliente->nome, 0, 2)}}</span>
                                 </div>
                              </div>
                              <div class="flex-1 min-w-0 ms-4">
                                 <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    <a class="cursor-pointer" data-modal-target="{{$cliente->cliente_uuid}}" data-modal-toggle="{{$cliente->cliente_uuid}}">
                                       <b>{{ $cliente->nome }}</b>
                                    </a>
                                 </p>
                                 <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    @foreach (explode(',', $cliente->lotes_vencendo) as $lote)
                                       <span class="inline-flex items-center justify-center w-6 h-6 me-2 text-sm font-semibold text-green-1000 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-1000">
                                          {{$lote}}
                                          <span class="sr-only">Icon description</span>
                                       </span>
                                    @endforeach
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white mr-2 me-2">
                                 <b>
                                    <x-layouts.badges.info-money
                                       :convert="false"
                                       :textLength="'sm'"
                                       :color="'purple'"
                                       :value="number_format($cliente->total_gasto_real, 2, '', '.')"
                                    />
                                 </b>
                                 &nbsp;
                                 <x-layouts.badges.info-money
                                    :convert="false"
                                    :textLength="'xs'"
                                    :value="number_format($cliente->total_gasto, 2, '', '.')"
                                    />
                                 <br>
                              </div>
                              <div class="inline-flex mr-2 me-2 items-center text-base font-semibold text-gray-900 dark:text-white">
                                 <a title="IR PARA O REGISTRO DE NOVO PRÉ-LANCE PARA ESTE CLIENTE" href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'clienteUuid' => $cliente->cliente_uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                     </svg>
                                 </a>
                                 <a title="IMPRIMIR RESUMO DESTE CLIENTE" target="_blank" href="{{route('leilao.mapa.prelance.resumo-cliente', ['uuid' => $leilao->uuid, 'clienteUuid' => $cliente->cliente_uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                     </svg>
                                 </a>
                                 <button title="COPIAR RAPIDAMENTE UM RESUMO PARA ENCAMINHAR NO WAHTSAPP"  onclick="copiarGastoPorCliente('{{$leilao->descricao}}', {{json_encode($cliente)}})" type="button" class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                       <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div> --}}




            <!--
            ------------------------------------------
            CLIENTES VENCEDORES POR LOTE
            ------------------------------------------
            -->
            {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
               <div class="flow-root">
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                     @foreach($leilao->lotes->sortBy('numero') as $lote)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <div style="background-color: {{$lote->prelance_vencedor() ? $lote->prelance_vencedor()->prelance_config()->first()->cor : 'grey'}}" class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full">
                                 <span class="font-medium text-black-600 dark:text-gray-300">
                                    <b>{{ $lote->numero }}</b>
                                 </span>
                              </div>
                           </div>
                           <div class="flex-1 min-w-0 ms-4">
                                 @if($lote->prelance_vencedor())
                                    @foreach($lote->prelance_vencedor()?->clientes()?->get() ?? [] as $index => $clienteVencedor)
                                       <p class="text-sm font-medium text-blue-900 truncate dark:text-white">
                                          <a class="cursor-pointer" data-modal-target="{{$clienteVencedor->uuid}}" data-modal-toggle="{{$clienteVencedor->uuid}}"><b>{{ $clienteVencedor->nome }}</b></a>
                                       </p>
                                    @endforeach
                                    <p>
                                       {{$lote->descricao}}
                                    </p>
                                    <p>
                                       <small>
                                          total:
                                          <x-layouts.badges.info-money
                                             :color="'purple'"
                                             :convert="true"
                                             :textLength="'sm'"
                                             :value="$lote->valor_prelance ?? 0"
                                          />&nbsp
                                             c. compra:
                                             <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="$lote->valor_prelance_comissao_compra"
                                                />
                                             &nbsp c. venda:
                                             <x-layouts.badges.info-money
                                                :convert="false"
                                                :textLength="'xs'"
                                                :value="$lote->valor_prelance_comissao_venda"
                                                />
                                       </small>
                                    </p>
                                 @else
                                    <p class="text-sm font-medium text-red-900 truncate dark:text-white">
                                       Nenhum lance registrado
                                    </p>
                                 @endif
                           </div>
                           <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                 <x-layouts.badges.info-money
                                    :convert="false"
                                    :color="'purple'"
                                    :textLength="'sm'"
                                    :value="$lote->prelance_vencedor()?->valor ?? 0"
                                 />
                              <br>
                           </div>
                        </div>
                        <div class="mt-2">
                           @livewire('components.app.lote-barra-progresso', [$lote, 'prelance', 'bar-only'])
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>       --}}




            <!--
            ------------------------------------------
            CLIENTES NO PRÉ-LANCE
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="clients-prelance" role="tabpanel" aria-labelledby="clients-prelance-tab">
               <div class="flow-root">
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                     @foreach($leilao->clientes()->get() as $cliente)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                 <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($cliente->nome, 0, 2)}}</span>
                              </div>
                           </div>
                           <div class="flex-1 min-w-0 ms-4">
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 <a class="cursor-pointer" data-modal-target="{{$cliente->uuid}}" data-modal-toggle="{{$cliente->uuid}}"><b>{{ $cliente->nome }}</b></a>
                              </p>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 {{ $cliente->email }}
                              </p>
                           </div>
                           <div class="inline-flex mr-2 me-2 items-center text-base font-semibold text-gray-900 dark:text-white">
                              <a title="IR PARA O REGISTRO DE NOVO PRÉ-LANCE PARA ESTE CLIENTE" href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'clienteUuid' => $cliente->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                  </svg>
                              </a>
                              <a title="IMPRIMIR RESUMO DESTE CLIENTE" target="_blank" href="{{route('leilao.mapa.prelance.resumo-cliente', ['uuid' => $leilao->uuid, 'clienteUuid' => $cliente->uuid])}}" type="button" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                  </svg>
                              </a>
                              <button title="COPIAR RAPIDAMENTE UM RESUMO PARA ENCAMINHAR NO WAHTSAPP"  onclick="copiarGastoPorCliente('{{$leilao->descricao}}', {{json_encode($cliente)}}, {{json_encode($cliente->prelances()->with('lote', 'prelance_config')->where('lance.leilao_uuid', $leilao->uuid)->groupBy('lance.id', 'lance_cliente.cliente_uuid')->get())}})" type="button" class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">
                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                 </svg>
                              </button>
                           </div>
                           <x-layouts.modals.simple-modal
                              :tamanho="6"
                              :identificador="$cliente->uuid"
                              :sessao="$cliente->uuid"
                              :titulo="$cliente->nome">
                              @section($cliente->uuid)
                              <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'clienteUuid' => $cliente->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 <svg class="w-6 h-6 text-white mr-2 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                  </svg>
                                 Novo lance
                              </a>
                                 <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                          <tr>
                                                <th scope="col" class="px-6 py-3">

                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Lote
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Data
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Lance
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Comissão C.
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Comissão V.
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Total
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                   Status
                                                </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @php
                                             $valorTotalComissaoComprador = 0;
                                             $valorTotalComissaoVendedor = 0;
                                             $valorTotal = 0;
                                          @endphp
                                          @foreach($cliente->prelances()->with('lote', 'prelance_config')->where('lance.leilao_uuid', $leilao->uuid)->groupBy('lance.id', 'lance_cliente.cliente_uuid')->get() as $prelance)
                                             @php
                                             if($prelance->uuid === $prelance->lote->prelance_vencedor()->uuid) {
                                                $valorTotalComissaoComprador += $prelance->valor_comissao_compra;
                                                $valorTotalComissaoVendedor += $prelance->valor_comissao_venda;
                                                $valorTotal += $prelance->lote->valor_prelance;
                                             }
                                             @endphp
                                             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                                <th scope="row" class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                   <div class="shrink-0">
                                                      <span style="background-color: {{$prelance->prelance_config->cor}}" class="h-5 w-5 inline-flex items-center font-medium px-2.5 py-0.5 rounded-full">
                                                   </span>
                                                   </div>
                                                </th>
                                                <td class="px-3 py-2">
                                                   <b>
                                                      {{$prelance->lote->numero}}
                                                   </b>
                                                </td>
                                                <td class="px-3 py-2" style="font-size: 10px">
                                                   <b>{{$prelance->created_at}}</b>
                                                </td>
                                                <td class="px-3 py-2" style="text-align: right">
                                                   <strong>
                                                      <x-layouts.badges.info-money
                                                         :color="'purple'"
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($prelance->valor, 2, '.', '')"
                                                      />
                                                   </strong>
                                                </td>
                                                <td class="px-3 py-2" style="text-align: right">
                                                      <x-layouts.badges.info-percent
                                                      :convert="false"
                                                      :textLength="'xs'"
                                                      :value="$prelance->prelance_config->percentual_comissao_comprador"
                                                   />
                                                   <strong>
                                                      <x-layouts.badges.info-money
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($prelance->valor_comissao_compra, 2, '.', '')"
                                                      />
                                                   </strong>
                                                </td>
                                                <td class="px-3 py-2" style="text-align: right">
                                                   <x-layouts.badges.info-percent
                                                      :convert="false"
                                                      :textLength="'xs'"
                                                      :value="$prelance->prelance_config->percentual_comissao_vendedor"
                                                   />
                                                   <strong>
                                                      <x-layouts.badges.info-money
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($prelance->valor_comissao_venda, 2, '.', '')"
                                                      />
                                                   </strong>
                                                </td>
                                                <td class="px-3 py-2" style="text-align: right">
                                                   <x-layouts.badges.info-money
                                                      :convert="false"
                                                      :textLength="'xs'"
                                                      :value="number_format($prelance->lote->valor_prelance, 2, '.', '')"
                                                   />
                                                </td>
                                                <td class="px-3 py-2" style="text-align: right">
                                                   @if($prelance->uuid === $prelance->lote->prelance_vencedor()->uuid)
                                                      <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                         <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                                         Vencendo
                                                      </span>
                                                   @else
                                                      <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                         <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                         Superado
                                                      </span>
                                                   @endif
                                                </td>
                                             </tr>
                                          @endforeach
                                          <tfoot>
                                             <tr style="background-color: #c3e6cb">
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td class="px-3 py-2" style="text-align: right">
                                                     <strong>
                                                         <x-layouts.badges.info-money
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($valorTotalComissaoComprador, 2, '.', '')"
                                                         />
                                                     </strong>
                                                 </td>
                                                 <td class="px-3 py-2" style="text-align: right">
                                                     <strong>
                                                         <x-layouts.badges.info-money
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($valorTotalComissaoVendedor, 2, '.', '')"
                                                         />
                                                     </strong>
                                                 </td>
                                                 <td class="px-3 py-2" style="text-align: right; color: white;">
                                                     <strong>
                                                         <x-layouts.badges.info-money
                                                         :convert="false"
                                                         :textLength="'xs'"
                                                         :value="number_format($valorTotal, 2, '.', '')"
                                                         />
                                                     </strong>
                                                 </td>
                                                 <td></td>
                                             </tr>
                                         </tfoot>
                                       </tbody>
                                    </table>
                                 </div>
                              {{-- <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                 @foreach($cliente->prelances()->with('lote')->where('lance.leilao_uuid', $leilao->uuid)->groupBy('lance.id', 'lance_cliente.cliente_uuid')->get() as $lance)
                                 <li class="pb-3 sm:pb-4" >
                                    <div class="flex items-center space-x-4 rtl:space-x-reverse" >
                                       <div class="flex-shrink-0">
                                          <span class="items-center justify-center w-6 h-6 bg-gray-100 rounded-full start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                             <svg class="w-6 h-6 {{$lance->uuid === $lance->lote->prelance_vencedor()->uuid ? 'text-green-600' : 'text-blue-100'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="flex-1 min-w-0">
                                          <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                             <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'loteUuid' => $lance->lote->uuid, 'clienteUuid' => $cliente->uuid])}}"  ><b role="button" >Lote {{$lance->lote->numero}}</b></a>
                                          </p>
                                          <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                             {{$lance->created_at}}
                                             <p><small>{{$lance->created_at_for_humans}}</small></p>
                                          </p>
                                          <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                             {{$lance->lote->descricao}}
                                          </p>
                                       </div>
                                       <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                          <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                          <x-layouts.badges.info-money
                                             :convert="false"
                                             :value="$lance->valor"
                                             ></x-layouts.badges.info-money>
                                       </div>
                                    </div>

                                 </li>
                                 @endforeach
                              </ul> --}}
                              @endsection
                           </x-layouts.modals.simple-modal>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>


            <!--
            ------------------------------------------
            VENDEDORES
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="vendedores" role="tabpanel" aria-labelledby="vendedores-tab">
               <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                  @foreach($vendedores as $vendedor)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                 <span class="font-medium text-gray-600 dark:text-gray-300">{{mb_substr($vendedor->nome, 0, 2)}}</span>
                              </div>
                           </div>
                           <div class="flex-1 min-w-0 ms-4">
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 <a class="cursor-pointer">
                                    <b>{{ $vendedor->nome }}</b>
                                 </a>
                              </p>
                           </div>
                           <div class="inline-flex mr-2 me-2 items-center text-base font-semibold text-gray-900 dark:text-white">
                              <a target="_blank" href="{{route('leilao.mapa.prelance.vendedor', ['uuid' => $leilao->uuid, 'vendedores' => json_encode([$vendedor->uuid])])}}" class="flex mr-2 px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                  </svg>
                              </a>
{{--                              <a target="_blank" class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-sm">--}}
{{--                                 <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">--}}
{{--                                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>--}}
{{--                                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>--}}
{{--                                 </svg>--}}
{{--                              </a>--}}
                           </div>
                        </div>
                     </li>
                  @endforeach
               </ul>
            </div>
            </div>


            <!--
            ------------------------------------------
            HISTÓRICO GERAL
            ------------------------------------------
            -->
            {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
               <div class="flow-root">
                  <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mt-2 mb-4 md:mb-5">
                     @foreach($leilao->lotes as $index => $lote)
                        <li class="mb-10 ms-8">
                           <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                           {{ $lote->numero }}
                           </span>
                           <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$lote->descricao}}</h6>
                           <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{$lote->created_at}} - {{$lote->prelances()->count() }} prelances</time>
                           <div class="w-full bg-gray-200 dark:bg-gray-700 mt-2">
                              <div
                              class="text-center bg-{{ $lote->valor_prelance_percentual_valor_estimado > 100 ? 'green' : 'blue' }}-600 text-xs text-{{ $lote->valor_prelance_percentual_valor_estimado > 100 ? 'green' : 'blue' }} font-medium text-{{ $lote->valor_prelance_percentual_valor_estimado > 100 ? 'green' : 'blue' }}-100 text-center p-1.5 leading-none"
                              style="width: {{ $lote->valor_prelance_percentual_valor_estimado > 100 ? 100 : $lote->valor_prelance_percentual_valor_estimado }}%">
                              </div>
                           </div>
                           <x-layouts.badges.info-percent
                              :convert="false"
                              :textLength="'sm'"
                              :value="$lote->valor_prelance_percentual_valor_estimado"
                              />
                           <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mt-2 mb-4 md:mb-5">
                              @foreach($lote->prelances()->get()->reverse() as $index => $lance)
                                 @if($index === 0)
                                    <li class="mb-10 ms-8">
                                       <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                             <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                          </svg>
                                       </span>
                                       @foreach($lance->clientes()->get() as $index => $cliente)
                                          <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$cliente->nome}}</h6>
                                       @endforeach
                                       <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $lance->created_at }}</time>
                                       <p><small>{{$lance->created_at_for_humans}}</small></p>
                                       <small class="flex">
                                          <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                          <x-layouts.badges.info-money
                                             :convert="false"
                                             :textLength="'sm'"
                                             :value="$lance->valor"
                                             />
                                       </small>
                                    </li>
                                 @else
                                    <li class="mb-10 ms-8">
                                       <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                                          </svg>
                                       </span>
                                       @foreach($lance->clientes()->get() as $index => $cliente)
                                          <h6 class="flex items-start mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$cliente->nome}}</h6>
                                       @endforeach
                                       <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $lance->created_at }}</time>
                                       <p><small>{{$lance->created_at_for_humans}}</small></p>
                                       <small class="flex">
                                          <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                          <x-layouts.badges.info-money
                                             :convert="false"
                                             :textLength="'sm'"
                                             :value="$lance->valor"
                                             />
                                       </small>
                                    </li>
                                 @endif
                              @endforeach
                           </ol>
                        </li>
                     @endforeach
                  </ol>
               </div>
            </div> --}}




            <!--
            ------------------------------------------
            GRÁFICOS
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="graficos" role="tabpanel" aria-labelledby="graficos-tab">
               <div class="flex flex-wrap mb-2">
                  <div class="w-full md:w-12/12 mb-6 md:mb-0">
                     @livewire('components.app.charts.prelance-lote-valor-atingido', [$leilao])
                  </div>
               </div>
               <div class="flex flex-wrap mb-2">
                  {{-- <div class="w-full md:w-6/12 mb-6 md:mb-0">
                     @livewire('components.app.charts.lote-prelance-percentual', [$leilao])
                  </div> --}}
                  <div class="w-full md:w-12/12 mb-6 md:mb-0">
                     @livewire('components.app.charts.lote-prelance-radial', [$leilao])
                  </div>
               </div>
            </div>




            <!--
            ------------------------------------------
            CONFIGURAÇÕES PRÉ-LANCE
            ------------------------------------------
            -->
{{--          @dd($leilao->config_prelance)--}}
{{--            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="configuracoes-prelance" role="tabpanel" aria-labelledby="configuracoes-prelance-tab">--}}
{{--               <div class="flow-root">--}}
{{--                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">--}}
{{--                     @foreach($leilao->config_prelance as $config)--}}
{{--                     <li class="py-3 sm:py-4">--}}
{{--                        <div class="flex items-center">--}}
{{--                           <div class="flex-shrink-0">--}}
{{--                              <span style="background-color:{{$config->cor}}" class="flex w-10 h-10 me-5 mt-3 rounded-full"></span>--}}
{{--                           </div>--}}
{{--                           <div class="flex-1 min-w-0 ms-4">--}}
{{--                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">--}}
{{--                                 Data: <b>{{ $config->data }}</b>--}}
{{--                              </p>--}}
{{--                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">--}}
{{--                                 Plano Pagamento: <b>{{ $config->plano_pagamento->descricao }}</b>--}}
{{--                              </p>--}}
{{--                              <ul>--}}
{{--                                 @foreach($config->plano_pagamento->condicoes_pagamento as $condicaoPagamento)--}}
{{--                                 <li>--}}
{{--                                    <p>--}}
{{--                                       <small>Parcelas: <b>{{$condicaoPagamento['qtd_parcelas']}}</b></small> |--}}
{{--                                       <small>Repetições: <b>{{$condicaoPagamento['repeticoes']}}</b></small> |--}}
{{--                                       <small>Comissão Vendedor: <b>{{$config->percentual_comissao_vendedor}} %</b></small> |--}}
{{--                                       <small>Comissão Comprador: <b>{{$config->percentual_comissao_comprador}} %</b></small>--}}
{{--                                    </p>--}}
{{--                                 </li>--}}
{{--                                 @endforeach--}}
{{--                              </ul>--}}
{{--                           </div>--}}
{{--                           <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">--}}
{{--                              $320--}}
{{--                              </div> -->--}}
{{--                        </div>--}}
{{--                     </li>--}}
{{--                     @endforeach--}}
{{--                  </ul>--}}
{{--               </div>--}}
{{--            </div>--}}
         </div>
      </div>
</div>


 <script>

     function formatarMoedaBrasileira(valor) {
         // Converte para número, trata casos undefined/null/string vazia
         const numero = valor ? Number(valor) : 0;

         return numero.toLocaleString('pt-BR', {
             style: 'currency',
             currency: 'BRL',
             minimumFractionDigits: 2,
             maximumFractionDigits: 2
         });
     }

     function copiarLotesGeralAnalitico(leilao, lotes) {
         let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         tabela += "*" + leilao.descricao + "*\n\n";
         tabela += "======================\n";
         tabela += "✍️ PRÉ-LANCE ✍️ \n";
         tabela += "======================\n\n";

         leilao.config_prelance.forEach(item => {
             const dataFormatada = new Date(item.data).toLocaleDateString('pt-BR');
             const isAtual = leilao.config_prelance_atual && (item.id === leilao.config_prelance_atual.id);

             tabela += (isAtual ? "*👉" : "") +
                 item.icone_whatsapp + " Dia: " + dataFormatada +
                 " Comissão: " + item.percentual_comissao_comprador + "%" +
                 (isAtual ? "👈*" : "") +
                 "\n";
         });

         tabela += "\n\n";

         lotes.sort((a, b) => a.numero - b.numero);
         lotes.forEach(item => {
             const temVencedor = item.prelance_vencedor && item.prelance_vencedor.valor !== undefined;
             const valorVencedor = formatarMoedaBrasileira(temVencedor ? item.prelance_vencedor.valor : 0);
             const valorPrelance = formatarMoedaBrasileira(item.valor_prelance || 0);

             tabela += `*Lote ${item.numero}*\n`;
             tabela += `*${item.descricao}*\n`;
             tabela += `${item.observacoes || 'Sem observações'}\n`;
             tabela += `Valor lance: ${valorVencedor.replace('R$', '*R$')}*\n`; // Mantém o negrito
             tabela += `Valor Lote: ${valorPrelance.replace('R$', '*R$')}*\n`; // Mantém o negrito

             if (temVencedor) {
                 tabela += `Comissão: ${item.prelance_vencedor.prelance_config.icone_whatsapp +
                 item.prelance_vencedor.prelance_config.percentual_comissao_comprador}%\n`;
             }

             tabela += "-----------------------\n\n";
         });

         navigator.clipboard.writeText(tabela);
         toastr.info("Informações copiadas com sucesso");
     }

     function copiarLotesGeralResumido(leilao, lotes) {
         let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         tabela += "======================\n";
         tabela += "*" + leilao.descricao + "*\n";
         tabela += "======================\n";
         tabela += "✍️ Resumo do Pré-lance ✍️ \n";
         tabela += "======================\n";
         tabela += `Comissão do dia: ${leilao.config_prelance_atual.percentual_comissao_comprador}%\n`;
         tabela += "======================\n\n";

         lotes.sort((a, b) => a.numero - b.numero);
         lotes.forEach(item => {
             const temVencedor = item.prelance_vencedor && item.prelance_vencedor.valor !== undefined;
             const numeroLote = String('Lote ' + item.numero).padEnd(5);
             const valorFormatado = temVencedor ?
                 formatarMoedaBrasileira(item.prelance_vencedor.valor).replace('R$', '*R$') + '*' :
                 'R$ 0,00';
             const percentual = temVencedor ? `(${parseInt(item.prelance_vencedor.prelance_config.percentual_comissao_comprador)} %)` : ``;

             tabela += `${numeroLote} ${temVencedor ? item.prelance_vencedor.prelance_config.icone_whatsapp : ''} ${valorFormatado.padStart(10)} ${percentual}\n`;
             tabela += `${item.descricao}\n`
             tabela += `-------------\n`
         });

         tabela += "======================\n";
         navigator.clipboard.writeText(tabela);
         toastr.info("Informações copiadas com sucesso");
     }

     function copiarLoteUnico(descricaoLeilao, lote, lances) {
         if(lances.length === 0) {
             toastr.error("Nenhum lance registrado para este lote");
             return;
         }

         let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         tabela += `*${descricaoLeilao.toUpperCase()}*\n\n`;
         tabela += "======================\n";
         tabela += "✍️ Resumo do Lote ✍️ \n";
         tabela += "======================\n";
         tabela += "═════════════\n";
         tabela += `*📌 LOTE 0${lote.numero} - ${lote.descricao}*\n`;
         tabela += `${lote.observacoes}\n`;
         tabela += "═════════════\n\n";

         tabela += "═════════════\n";
         tabela += "*📊 PRÉ-LANCES*\n";
         tabela += "═════════════\n\n";

         lances.forEach((item, index) => {
             const data = new Date(item.prelance_config.data).toLocaleDateString('pt-BR');
             const valorFormatado = formatarMoedaBrasileira(item.valor).replace('R$', '*R$') + '*';
             const comissaoComprador = item.prelance_config.percentual_comissao_comprador;

             tabela += `*🎯 ${index + 1}º LANCE*\n`;
             tabela += `🗓️ Data: *${data}*\n`;
             tabela += `💰 Valor lance: ${valorFormatado}\n`;
             tabela += `📊 C. Comprador: *${comissaoComprador}%*\n`;
             tabela += "──────────────\n\n";
         });

         const maiorLance = lances[lances.length - 1];
         const valorMaiorLance = formatarMoedaBrasileira(maiorLance.valor).replace('R$', '*R$') + '*';
         const valorLoteFormatado = formatarMoedaBrasileira(lote.valor_prelance).replace('R$', '*R$') + '*';

         tabela += "═════════════\n";
         tabela += "*📌 RESUMO FINAL*\n";
         tabela += `🔝 Maior lance: ${valorMaiorLance}\n`;
         tabela += `📅 Data: ${new Date(maiorLance.prelance_config.data).toLocaleDateString('pt-BR')}\n`;
         tabela += `🧮 Total de lances: ${lances.length}\n`;
         tabela += `💰 Valor Lote: ${valorLoteFormatado}\n`;
         tabela += "═════════════\n";

         navigator.clipboard.writeText(tabela);
         toastr.info("Informações copiadas com sucesso");
     }

     function copiarGastoPorCliente(descricaoLeilao, cliente, prelances) {
         let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         tabela += "*" + descricaoLeilao + "*\n\n";
         tabela += "======================\n";
         tabela += "✍️ Resumo do Cliente ✍️ \n";
         tabela += "======================\n";
         tabela += "*👔 Cliente: " + cliente.nome + "*\n\n";

         const lancesVencedores = prelances.filter(item =>
             item.uuid === item.lote.prelance_vencedor.uuid
         );

         prelances.forEach((item, index) => {
             const data = new Date(item.created_at).toLocaleDateString('pt-BR');
             const hora = new Date(item.created_at).toLocaleTimeString('pt-BR');
             const valorFormatado = formatarMoedaBrasileira(item.valor).replace('R$', '*R$') + '*';
             const valorComissaoCompra = formatarMoedaBrasileira(item.valor_comissao_compra);
             const valorComissaoVenda = formatarMoedaBrasileira(item.valor_comissao_venda);
             const valorPrelance = formatarMoedaBrasileira(item.lote.valor_prelance);
             const status = item.uuid === item.lote.prelance_vencedor.uuid ? "✅ Vencendo" : "❌ Superado";

             tabela += `*🎯 LOTE ${item.lote.numero} - ${item.lote.descricao}*\n`;
             tabela += `🗓️ Data/Hora: *${data} - ${hora}*\n`;
             tabela += `💰 Valor Lance: ${valorFormatado}\n`;
             tabela += `📊 Comissão: *${item.prelance_config.percentual_comissao_comprador}%*  ${valorComissaoCompra.replace('R$', '*R$')}*\n`;
             tabela += `🏷️ Valor Lote: ${valorPrelance.replace('R$', '*R$')}*\n`;
             tabela += `📌 Status: *${status}*\n`;
             tabela += "────────────────────────\n\n";
         });

         // Correção aplicada aqui - formata primeiro, depois aplica o replace
         const totalLances = formatarMoedaBrasileira(
             lancesVencedores.reduce((sum, p) => sum + parseFloat(p.valor), 0)
         ).replace('R$', '*R$') + '*';

         const totalPrelance = formatarMoedaBrasileira(
             lancesVencedores.reduce((sum, p) => sum + parseFloat(p.lote.valor_prelance), 0)
         ).replace('R$', '*R$') + '*';

         const totalComissaoCompra = formatarMoedaBrasileira(
             lancesVencedores.reduce((sum, p) => sum + parseFloat(p.valor_comissao_compra), 0)
         );

         tabela += "*📊 RESUMO FINAL (APENAS LANCES VENCEDORES)*\n";
         tabela += `💰 Total: ${totalPrelance}\n`;
         tabela += `💰 Total Lances: ${totalLances}\n`;
         tabela += `💸 Total Comissão Compra: ${totalComissaoCompra.replace('R$', '*R$')}*\n`;
         tabela += `\n*📈 Qtd de Lances: ${prelances.length}*\n`;
         tabela += `*🏆 Lances Vencedores: ${lancesVencedores.length}*\n`;

         navigator.clipboard.writeText(tabela);
         toastr.info("Informações copiadas com sucesso");
     }

     function copiarConfiguracaoPrelance(descricaoLeilao, lote, lances)
   {
      tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
      tabela += "🔨 *"+descricaoLeilao+"* 🔨\n\n";
      tabela += "*🐮 Lote "+lote.numero+"*\n";
      tabela += "✍️ "+lote.descricao+"\n\n";
      tabela += "Pré-lances\n";

      lances.forEach(item => {
         let data = new Date(item.created_at).toLocaleDateString('pt-BR');
         tabela += `- 🗓️ ${String(data).padEnd(5)} 💰 *${'R$'+item.valor.padStart(7)}* \n`;
         tabela +=  `- C. comprador: (${item.percentual_comissao_comprador}%) \n`;
         tabela +=  `- C. vendedor: (${item.percentual_comissao_vendedor}%) \n`;
      });

      tabela += "===================";
      navigator.clipboard.writeText(tabela);

       toastr.info("Informações copiadas com sucesso");
   }

   function copiarInformacoesVendedor()
   {

   }

     function copiarVencendo(descricaoLeilao, lanceVencedor) {
         const valorFormatado = formatarMoedaBrasileira(lanceVencedor.valor);
         const dataLance = new Date(lanceVencedor.created_at).toLocaleDateString('pt-BR');
         const horaLance = new Date(lanceVencedor.created_at).toLocaleTimeString('pt-BR', {hour: '2-digit', minute:'2-digit'});
         const comissaoFormatada = lanceVencedor.prelance_config.percentual_comissao_comprador + '%';
         const valorComissao = formatarMoedaBrasileira(lanceVencedor.valor_comissao_compra);

         let mensagem = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         mensagem += "*" + descricaoLeilao + "*\n\n";
         mensagem += "======================\n";
         mensagem += "📢 *LANCE CONFIRMADO* 📢\n";
         mensagem += "======================\n";

         mensagem += `\n`;
         mensagem += `✨ *Lote ${lanceVencedor.lote.numero}* - ${lanceVencedor.lote.descricao || 'Sem descrição'}\n\n`;
         mensagem += `💎 *Valor do Lance:* ${valorFormatado}\n`;
         mensagem += `📅 *Data/Hora:* ${dataLance} às ${horaLance}\n\n`;
         mensagem += `📊 *Detalhes Financeiros*\n`;
         mensagem += `• Comissão: ${lanceVencedor.prelance_config.icone_whatsapp} ${comissaoFormatada}\n`;
         mensagem += `• Valor da Comissão: ${valorComissao}\n`;
         mensagem += `• Total lote: ${formatarMoedaBrasileira(lanceVencedor.lote.valor_prelance)}\n\n`;
         mensagem += `⚠️ *Atenção:* Este é o vencedor ATUAL. O lote permanece aberto para novos lances até o encerramento.`;

         navigator.clipboard.writeText(mensagem);
         toastr.info("📢 Lance VENCEDOR copiado com sucesso");
         return mensagem;
     }

     function copiarSuperado(descricaoLeilao, lanceSuperado, lanceVencedor) {
         const valorSuperado = formatarMoedaBrasileira(lanceSuperado.valor);
         const valorVencedor = formatarMoedaBrasileira(lanceVencedor.valor);
         const diferenca = formatarMoedaBrasileira(lanceVencedor.valor - lanceSuperado.valor);
         const numeroLote = lanceSuperado.lote.numero;
         const descricaoLote = lanceSuperado.lote.descricao || '';
         const comissaoFormatada = lanceVencedor.prelance_config.percentual_comissao_comprador + '%';

         let mensagem = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
         mensagem += "*" + descricaoLeilao + "*\n\n";
         mensagem += "======================\n";
         mensagem += "📢 *LANCE SUPERADO* 📢\n";
         mensagem += "======================\n";

         mensagem += `\n`;
         mensagem += `⚠️ Seu lance no *Lote ${numeroLote} ${descricaoLote}* foi superado por ${diferenca} reais\n\n`;
         mensagem += `🔹 *Seu lance:* ${valorSuperado}\n`;
         mensagem += `🔹 *Novo lance vencedor:* ${valorVencedor}\n`;
         mensagem += `🔹 *Diferença:* ${diferenca}\n`;
         mensagem += `🔹 *Comissão:* ${lanceVencedor.prelance_config.icone_whatsapp} ${comissaoFormatada}\n`;
         mensagem += `🔹 *Total lote:* ${formatarMoedaBrasileira(lanceSuperado.lote.valor_prelance)}\n\n`;

         mensagem += `ℹ️ Você pode fazer um novo lance se desejar.`;

         navigator.clipboard.writeText(mensagem);
         toastr.info("📢 Lance SUPERADO copiado com sucesso");
         return mensagem;
     }
 </script>
