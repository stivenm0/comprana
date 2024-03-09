<div class="container px-6 mx-auto">
    <div class="flex flex-col my-8 lg:flex-row">
        <div class="order-2 w-full lg:w-1/2">
            <div class="flex items-center">
                <button class="flex text-sm text-blue-500 focus:outline-none"><span
                        class="{{ $step === 1 ? 'bg-blue-500 text-white' : 'border-2 border-blue-500 ' }} flex items-center justify-center w-5 h-5 mr-2 rounded-full">1</span>
                    Contactos</button>
                <button class="flex ml-8 text-sm text-gray-700 focus:outline-none"><span
                        class="{{ $step === 2 ? 'bg-blue-500 text-white' : 'border-2 border-blue-500 ' }} flex items-center justify-center w-5 h-5 mr-2 border-2 border-blue-500 rounded-full">2</span>
                    Pagar
                </button>
            </div>

            {{-- left  --}}
            @switch($step)
                @case(1)
                    <form class="my-8 lg:w-3/4" wire:submit.prevent='contacts'>
                        <div class="mt-8">
                            <h4 class="text-sm font-medium text-gray-500">Teléfono:</h4>
                            <div class="flex mt-2">
                                <label class="flex-1 block ml-3">
                                    <input type="number" wire:model='phone'
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Teléfono">
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('phone')" class="mb-4" />

                            <h4 class="text-sm font-medium text-gray-500">Dirección:</h4>
                            <div class="flex mt-2">
                                <label class="flex-1 block ml-3">
                                    <textarea wire:model='address'
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Dirección"></textarea>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('address')" class="mb-4" />
                        </div>
                        <div class="flex items-center justify-end  mt-8">

                            <button type="submit"
                                class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Siguiente</span>
                                <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                @break

                @case(2)
                    <div class="flex flex-col my-5">
                        <div class="overflow-x-auto ">
                            <div class="py-2 inline-block min-w-full sm:px-1 lg:px-2">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Nombre
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Precio
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Cantidad
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($this->products as $product)
                                                @php
                                                    $total += $product->price;
                                                @endphp
                                                <tr class="bg-gray-100 border-b">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $product->name }}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->price }}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->pivot->cant }}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->pivot->cant * $product->price }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button wire:click='back()'
                        class="flex items-center text-sm font-medium text-gray-700 rounded hover:underline focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                        </svg>
                        <span class="mx-2">Volver</span>
                    </button>
                @break
            @endswitch
        </div>

        {{-- Right  --}}
        <div class="flex-shrink-0 order-1  w-full mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
            @if ($step === 1)
                <img src="{{ asset('srcs/DALL·E 2024-02-28 15.36.51 - informacion de contacto estilo supermercado.png') }}" alt="contactos" class="w-1/2 mx-auto rounded-md">

            @elseif($step === 2)
                <div class="flex justify-center lg:justify-end">
                    <div class="w-full max-w-md px-4 py-3 border bg-white rounded-md">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-700">Total a Pagar: $ {{$total}}</h3>
                        </div>
                        <button type="button" wire:click='pay()' class="bg-blue-800 text-white w-full mt-6 rounded-md py-1">
                            Pagar
                        </button>
                    </div>
                </div>
            @endif



        </div>

    </div>
</div>
