<div>
   <div class="flex w-full md:w-12/12 mb-6 md:mb-0">
      <div class="w-full space-y-12 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
         <!-- Pricing Card -->
         <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <h3 class="mb-4 text-2xl font-semibold">
               <x-layouts.badges.info-money
                  :convert="true"
                  :textLength="'lg'"
                  :value="$leilao->valor_prelance_comissao_compra" />
            </h3>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
         </div>
         <!-- Pricing Card -->
         <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <h3 class="mb-4 text-2xl font-semibold">
               <x-layouts.badges.info-money
                  :convert="true"
                  :textLength="'lg'"
                  :value="$leilao->valor_prelance_comissao_venda" />
            </h3>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
         </div>
         <!-- Pricing Card -->
         <div class="flex flex-col p-6 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <h3 class="mb-4 text-2xl font-semibold">
               <x-layouts.badges.info-number
                  :textLength="'lg'"
                  :value="$leilao->lotes->count()" />
            </h3>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Lotes</p>
         </div>
         <!-- Pricing Card -->
         <div class="flex flex-col p-6 w-full  max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <h3 class="mb-4 text-2xl font-semibold">
               <x-layouts.badges.info-money
                  :convert="true"
                  :textLength="'lg'"
                  :value="$leilao->valor_prelance_comissao_total" />
            </h3>
            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total Comissão</p>
         </div>
      </div>
   </div>

   <br>
  
   <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-12/12 mb-6 md:mb-0">
         <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
               <li class="me-2" role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg" 
                     id="profile-tab" 
                     data-tabs-target="#profile" 
                     type="button" 
                     role="tab" 
                     aria-controls="profile" 
                     aria-selected="false">
                     Lotes
                  </button>
               </li>
               <li class="me-2" role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="dashboard-tab" 
                     data-tabs-target="#dashboard" 
                     type="button" 
                     role="tab" 
                     aria-controls="dashboard" 
                     aria-selected="false">
                     Gasto por cliente
                  </button>
               </li>
               <li class="me-2" role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="settings-tab" 
                     data-tabs-target="#settings" 
                     type="button" 
                     role="tab" 
                     aria-controls="settings" 
                     aria-selected="false">
                     Clientes vencedores
                  </button>
               </li>
               <li class="me-2" role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="clients-prelance-tab" 
                     data-tabs-target="#clients-prelance" 
                     type="button" 
                     role="tab" 
                     aria-controls="clients-prelance" 
                     aria-selected="false">
                     Clientes no pré-lance
                  </button>
               </li>
               <li role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="contacts-tab" 
                     data-tabs-target="#contacts" 
                     type="button" 
                     role="tab" 
                     aria-controls="contacts" 
                     aria-selected="false">
                     Histórico geral
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
               <li role="presentation">
                  <button 
                     class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                     id="configuracoes-prelance-tab" 
                     data-tabs-target="#configuracoes-prelance" 
                     type="button" 
                     role="tab" 
                     aria-controls="configuracoes-prelance" 
                     aria-selected="false">
                     Configurações do pré-lance
                  </button>
               </li>
               <li role="presentation">
                  <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                     <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                     </svg>
                     REGISTRAR NOVO LANCE
                  </a>
               </li>
            </ul>
         </div>
         <div id="default-tab-content">
            <!-- 
            ------------------------------------------
            LOTES
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <button type="button" onclick="copiarLotesGeralResumido({{json_encode($leilao->toArray())}}, {{json_encode($leilao->lotes->toArray())}})" type="button" class="mt-4 p-1 mb-2 text-center text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M14.516 6.743c-.41-.368-.443-1-.077-1.41a.99.99 0 0 1 1.405-.078l5.487 4.948.007.006A2.047 2.047 0 0 1 22 11.721a2.06 2.06 0 0 1-.662 1.51l-5.584 5.09a.99.99 0 0 1-1.404-.07 1.003 1.003 0 0 1 .068-1.412l5.578-5.082a.05.05 0 0 0 .015-.036.051.051 0 0 0-.015-.036l-5.48-4.942Zm-6.543 9.199v-.42a4.168 4.168 0 0 0-2.715 2.415c-.154.382-.44.695-.806.88a1.683 1.683 0 0 1-2.167-.571 1.705 1.705 0 0 1-.279-1.092V15.88c0-3.77 2.526-7.039 5.967-7.573V7.57a1.957 1.957 0 0 1 .993-1.838 1.931 1.931 0 0 1 2.153.184l5.08 4.248a.646.646 0 0 1 .012.011l.011.01a2.098 2.098 0 0 1 .703 1.57 2.108 2.108 0 0 1-.726 1.59l-5.08 4.25a1.933 1.933 0 0 1-2.929-.614 1.957 1.957 0 0 1-.217-1.04Z" clip-rule="evenodd"/>
                  </svg>
                  resumo
               </button>

               <button type="button" onclick="copiarLotesGeralAnalitico({{json_encode($leilao->toArray())}}, {{json_encode($leilao->lotes->toArray())}})" type="button" class="mt-4 p-1 mb-2 text-center text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M14.516 6.743c-.41-.368-.443-1-.077-1.41a.99.99 0 0 1 1.405-.078l5.487 4.948.007.006A2.047 2.047 0 0 1 22 11.721a2.06 2.06 0 0 1-.662 1.51l-5.584 5.09a.99.99 0 0 1-1.404-.07 1.003 1.003 0 0 1 .068-1.412l5.578-5.082a.05.05 0 0 0 .015-.036.051.051 0 0 0-.015-.036l-5.48-4.942Zm-6.543 9.199v-.42a4.168 4.168 0 0 0-2.715 2.415c-.154.382-.44.695-.806.88a1.683 1.683 0 0 1-2.167-.571 1.705 1.705 0 0 1-.279-1.092V15.88c0-3.77 2.526-7.039 5.967-7.573V7.57a1.957 1.957 0 0 1 .993-1.838 1.931 1.931 0 0 1 2.153.184l5.08 4.248a.646.646 0 0 1 .012.011l.011.01a2.098 2.098 0 0 1 .703 1.57 2.108 2.108 0 0 1-.726 1.59l-5.08 4.25a1.933 1.933 0 0 1-2.929-.614 1.957 1.957 0 0 1-.217-1.04Z" clip-rule="evenodd"/>
                  </svg>
                  analítico
               </button>
               <div class="space-y-4 lg:grid lg:grid-cols-6 pr-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                  @foreach($leilao->lotes as $index => $lote)
                     <div data-modal-target="{{$lote->uuid}}" data-modal-toggle="{{$lote->uuid}}"
                        style="background-color: {{ $lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc' }}" class="flex flex-col p-4 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                           {{ $index + 1 }}
                        </h5>
                        <p>
                           <x-layouts.badges.info-money
                              :convert="false"
                              :textLength="'md'"
                              :value="$lote->prelance_vencedor()?->valor ?? 0" />
                        </p>
                     </div>
                        <x-layouts.modals.simple-modal
                           :tamanho="4"
                           :identificador="$lote->uuid"
                           :sessao="$lote->uuid"
                           :titulo="'Lote '.$lote->numero">
                           @section($lote->uuid)
                           <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'loteUuid' => $lote->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                 <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                 <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                              </svg>
                              REGISTRAR NOVO LANCE
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
                           @livewire('components.app.lote-barra-progresso', [$lote]) 
                           <small>
                              <x-layouts.badges.info-percent
                                 :convert="false"
                                 :textLength="'md'"
                                 :value="$lote->valor_prelance_percentual_valor_estimado" />
                           </small>
                           <div class="flex w-full md:w-12/12 mb-6 md:mb-0">
                              <div class="space-y-12 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-money
                                          :convert="false"
                                          :textLength="'xs'"
                                          :value="$lote->valor_prelance_comissao_compra" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Compra</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-money
                                          :convert="false"
                                          :textLength="'xs'"
                                          :value="$lote->valor_prelance_comissao_venda" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Comissao Venda</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">
                                       <x-layouts.badges.info-number
                                          :textLength="'xs'"
                                          :value="$lote->prelances->count()" />
                                    </h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Total prelances</p>
                                 </div>
                                 <!-- Pricing Card -->
                                 <div class="flex flex-col p-3 w-full  max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-3 dark:bg-gray-800 dark:text-white">
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
                           <small class="mt-6">Histórico de prelances 
                              <button type="button" onclick="copiarLoteUnico('{{$leilao->descricao}}', {{json_encode($lote)}}, {{json_encode($lote->prelances()->get()->toArray())}})" type="button" class="mt-4 p-1 mb-2 text-center text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M14.516 6.743c-.41-.368-.443-1-.077-1.41a.99.99 0 0 1 1.405-.078l5.487 4.948.007.006A2.047 2.047 0 0 1 22 11.721a2.06 2.06 0 0 1-.662 1.51l-5.584 5.09a.99.99 0 0 1-1.404-.07 1.003 1.003 0 0 1 .068-1.412l5.578-5.082a.05.05 0 0 0 .015-.036.051.051 0 0 0-.015-.036l-5.48-4.942Zm-6.543 9.199v-.42a4.168 4.168 0 0 0-2.715 2.415c-.154.382-.44.695-.806.88a1.683 1.683 0 0 1-2.167-.571 1.705 1.705 0 0 1-.279-1.092V15.88c0-3.77 2.526-7.039 5.967-7.573V7.57a1.957 1.957 0 0 1 .993-1.838 1.931 1.931 0 0 1 2.153.184l5.08 4.248a.646.646 0 0 1 .012.011l.011.01a2.098 2.098 0 0 1 .703 1.57 2.108 2.108 0 0 1-.726 1.59l-5.08 4.25a1.933 1.933 0 0 1-2.929-.614 1.957 1.957 0 0 1-.217-1.04Z" clip-rule="evenodd"/>
                                 </svg>
                                 copiar
                              </button>                     
                           </small>
                           <ol class="mt-6 relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">
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
                                 <small class="flex">
                                    <span style="background-color: {{ $lance->prelance_config()->first()->cor }}" class="flex w-3 h-3 mt-1 me-3 rounded-full"></span>
                                    <x-layouts.badges.info-money
                                       :convert="false"
                                       :textLength="'sm'"
                                       :value="$lance->valor"
                                       />
                                 </small>
                                 <p><small>{{$lance->created_at_for_humans}}</small></p>
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
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
               <div class="flow-root">
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
                                    <a class="cursor-pointer" data-modal-target="{{$cliente->cliente_uuid}}" data-modal-toggle="{{$cliente->cliente_uuid}}">{{ $cliente->nome }}</a>
                                 </p>
                                 <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Lotes {{ $cliente->lotes_vencendo }}
                                 </p>
                              </div>
                              <div class="inline-flex mr-2 me-2 items-center text-base font-semibold text-gray-900 dark:text-white">
                                 {{ $cliente->total_lotes }} lote(s)
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                 <x-layouts.badges.info-money
                                    :convert="false"
                                    :textLength="'lg'"
                                    :value="number_format($cliente->total_gasto, 2, '', '.')"
                                    />
                                 <br>
                              </div>
                           </div>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>




            <!-- 
            ------------------------------------------
            CLIENTES VENCEDORES POR LOTE
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
               <div class="flow-root">
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                     @foreach($leilao->lotes as $lote)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-{{$lote->prelance_vencedor() ? 'green' : 'grey'}}-100 rounded-full dark:bg-gray-600">
                                 <span class="font-medium text-gray-600 dark:text-gray-300">{{ $lote->numero }}</span>
                              </div>
                           </div>
                           <div class="flex-1 min-w-0 ms-4">
                                 @if($lote->prelance_vencedor())
                                    @foreach($lote->prelance_vencedor()?->clientes()?->get() ?? [] as $index => $clienteVencedor)
                                       <p class="text-sm font-medium text-blue-900 truncate dark:text-white">
                                          <a class="cursor-pointer" data-modal-target="{{$clienteVencedor->uuid}}" data-modal-toggle="{{$clienteVencedor->uuid}}">{{ $clienteVencedor->nome }}</a>
                                       </p>
                                    @endforeach
                                    <p>
                                       <small>
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
                                    <p>
                                       <small>
                                             {{$lote->prelance_vencedor()->created_at_for_humans}}
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
                                 :textLength="$lote->prelance_vencedor() ? 'lg' : 'sm'"
                                 :value="$lote->prelance_vencedor()?->valor ?? 0"
                                 />
                              <br>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>      




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
                                 <a class="cursor-pointer" data-modal-target="{{$cliente->uuid}}" data-modal-toggle="{{$cliente->uuid}}">{{ $cliente->nome }}</a>
                              </p>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 {{ $cliente->email }}
                              </p>
                           </div>
                           <x-layouts.modals.simple-modal
                              :tamanho="4"
                              :identificador="$cliente->uuid"
                              :sessao="$cliente->uuid"
                              :titulo="$cliente->nome">
                              @section($cliente->uuid)
                              <a href="{{route('prelance.create', ['leilaoUuid' => $leilao->uuid, 'clienteUuid' => $cliente->uuid])}}" type="button" class="px-6 w-full mb-2 text-center py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                 </svg>
                                 REGISTRAR NOVO LANCE
                              </a>
                              <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
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
                              </ul>
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
            HISTÓRICO GERAL
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
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
            </div>




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
                  <div class="w-full md:w-6/12 mb-6 md:mb-0">
                     @livewire('components.app.charts.lote-prelance-percentual', [$leilao])
                  </div>
                  <div class="w-full md:w-6/12 mb-6 md:mb-0">
                     @livewire('components.app.charts.lote-prelance-radial', [$leilao])
                  </div>
               </div>
            </div>




            <!-- 
            ------------------------------------------
            CONFIGURAÇÕES PRÉ-LANCE
            ------------------------------------------
            -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="configuracoes-prelance" role="tabpanel" aria-labelledby="configuracoes-prelance-tab">
               <div class="flow-root">
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                     @foreach($leilao->config_prelance as $config)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <span style="background-color:{{$config->cor}}" class="flex w-10 h-10 me-5 mt-3 rounded-full"></span>
                           </div>
                           <div class="flex-1 min-w-0 ms-4">
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 Data: <b>{{ $config->data }}</b>
                              </p>
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 Plano Pagamento: <b>{{ $config->plano_pagamento->descricao }}</b>
                              </p>
                              <ul>
                                 @foreach($config->plano_pagamento->condicoes_pagamento as $condicaoPagamento)
                                 <li>
                                    <p>
                                       <small>Parcelas: <b>{{$condicaoPagamento['qtd_parcelas']}}</b></small> |
                                       <small>Repetições: <b>{{$condicaoPagamento['repeticoes']}}</b></small> |
                                       <small>Comissão Venda: <b>{{$condicaoPagamento['percentual_comissao_vendedor']}} %</b></small> |
                                       <small>Comissão Compra: <b>{{$condicaoPagamento['percentual_comissao_comprador']}} %</b></small>
                                    </p>
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                           <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                              $320
                              </div> -->
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
 </div>
 <script>
   
   function copiarLotesGeralAnalitico(leilao, lotes)
   {
      let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
      tabela += "🔨 *"+leilao.descricao+"* 🔨\n\n";
      tabela += "✍️ Lotes e valores disponíveis para pré-lance e suas condições de pagamento ✍️ \n"
      
      lotes.forEach(item => {
         console.log(item);
         tabela += `- ${'*Lote ' + item.numero + '*'} \n`;
         tabela += `🐮 ${item.descricao} \n`;
         tabela += `✍️ ${'Obs: ' + item.observacoes} \n`;
         tabela += `💰 ${'*R$'+item.prelance_vencedor.valor+'*'} \n`;
         tabela += "-----------------------\n";
      });

      navigator.clipboard.writeText(tabela);

      toastr.info("COPIADO para a área de transferência. Use CTRL + V para colar em campos de texto.")
   }

   function copiarLotesGeralResumido(leilao, lotes)
   {
      let tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
      tabela += "🔨 *"+leilao.descricao+"* 🔨\n\n";
      tabela += "✍️ Resumo de lotes e valores disponíveis para pré-lance ✍️ \n"

      lotes.forEach(item => {
         tabela += `- 🐮 ${String('Lote ' + item.numero).padEnd(5)} 💰 ${String('*R$'+item.prelance_vencedor.valor+'*').padStart(10)}\n`;
      });

      tabela += "======================\n";
      navigator.clipboard.writeText(tabela);
      
      toastr.info("COPIADO para a área de transferência. Use CTRL + V para colar em campos de texto.")
   }

   function copiarLoteUnico(descricaoLeilao, lote, lances)
   {
      tabela = "🅰️ *ATUAL LEILÕES E EVENTOS*\n";
      tabela += "🔨 *"+descricaoLeilao+"* 🔨\n\n";
      tabela += "*🐮 Lote "+lote.numero+"*\n";
      tabela += "✍️ "+lote.descricao+"\n\n";
      tabela += "===================\n";
      tabela += "Pré-lances\n";
      tabela += "===================\n";
      lances.forEach(item => {
         let data = new Date(item.prelance_config.data).toLocaleDateString('pt-BR');
         tabela += `🗓️ ${String(data).padEnd(5)} 💰 *${'R$'+item.valor.padStart(7)}* \n`;
         tabela +=  `C. comprador: *${item.prelance_config.percentual_comissao_comprador}*% \n`;
         tabela +=  `C. vendedor: *${item.prelance_config.percentual_comissao_vendedor}*% \n`;
         tabela += "----------------------\n";
      });

      navigator.clipboard.writeText(tabela);
      
      toastr.info("COPIADO para a área de transferência. Use CTRL + V para colar em campos de texto.")
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
      
      toastr.info("COPIADO para a área de transferência. Use CTRL + V para colar em campos de texto.")
   }
 </script>