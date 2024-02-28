<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Carrito
    </h2>
  </x-slot>

  <x-commons.info-list 
  title="Información de Carrito" 
  :list="[
      'Si desea cambiar la cantidad de un producto, debe seleccionar la cantidad y luego darle actualizar.',
      'Si agrega un producto que ya está en el carrito, este se actualizará.',
  ]"
  />

  <livewire:cart-products-list :$cart lazy>

  <x-commons.footer />
</x-app-layout>