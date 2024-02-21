<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis Carritos') }}
        </h2>
    </x-slot>
    
    <x-commons.info-list 
    title="Información de Carritos" 
    :list="[
        'Tienes 8 carritos; puedes editar su nombre y vaciarlos.',
        'El carrito activo estará de primero y estará sombreado de verde.',
        'Los productos que agregues se irán al carrito activo.'
    ]"
    />

      <!-- list cart-->
    <livewire:cart-list>
   
    <x-commons.footer />
</x-app-layout>