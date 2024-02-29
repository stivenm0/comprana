<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis Pedidos') }}
        </h2>
    </x-slot>

    <x-commons.info-list title="Información de Carritos" :list="[
       'Procesando: El pedido se está alistando para ser enviado.',
       'En Camino: El pedido ha sido enviado y está en camino a su destino.',
       'Entregado: El pedido ha sido entregado en el destino.',
       'No Entregado: Nadie ha recibido el pedido. Puede reclamarlo en el punto físico.',
   ]" />


    @include('orders.partials.filters')

    <livewire:order-list>


    <x-commons.footer />
</x-app-layout>