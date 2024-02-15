<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis Carritos') }}
        </h2>
    </x-slot>



    <header class="max-w-2xl mx-auto mt-5 divide-y bg-sky-100  shadow shadow-blue-600 rounded-xl">
      
            <details class="group">
                {{-- button open  --}}
                <summary class="flex items-center gap-3 px-4 py-3 font-medium marker:content-none hover:cursor-pointer">
                    <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                    <span>Información de Carritos</span>
                </summary>
    
                {{-- info --}}
                <article class="px-4 pb-4">
 
                        <ul class=" mt-2 space-y-3 font-medium">
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    Tienes 8 Carritos; puedes editar su nombre y vaciarlo.
                                </p>
                            </li>
                            <li class="flex items-start mt-5 lg:col-span-1 lg:mt-0">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    El carrito activo estara de primero y sombreado de verde
                                </p>
                            </li>
                            <li class="flex items-start mt-5 lg:col-span-1 lg:mt-0">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    Los productos que agreges se iran al carrito activo
                                </p>
                            </li>
                        </ul>
                  
                </article>
            </details>
        </header>
    



    
    
    
      <!-- component -->
    <livewire:cart-list>
   
    <x-commons.footer />
</x-app-layout>