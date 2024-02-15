<div x-data="{cant: @entangle('cant'), price: {{$product->price}}, total: 0  }" 
    x-init=' $watch("cant", value => total = price * cant)
        total = cant * price
        pay += total;
        ' 
    class="justify-between p-4 mb-4 bg-white rounded-lg shadow-md sm:flex sm:justify-start">
      <img src="/storage/images/{{$product->image->name}}" alt="product-image" class="w-full rounded-lg sm:w-40" />
      <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        <div class="mt-5 sm:mt-0">
          <h2 class="text-lg font-bold text-gray-900">{{$product->name}}</h2>
          <p class="mt-1 text-xs text-gray-700">{{$product->price}}</p>
        </div>
        <div class="flex justify-between mt-4 sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
          <div class="flex items-center border-gray-100">
            <span   @click=" pay -= price
            cant = cant <= 1 ? 1 : parseInt(cant) - 1"
              class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
              - 
            </span>
            <span class="flex items-center justify-center w-8 h-8 text-xs bg-white border outline-none" x-text="cant" ></span>
            <span @click=" pay += price
            cant = cant >= 1000 ? cant :  parseInt(cant) +1"
              class="px-3 py-1 duration-100 bg-gray-100 rounded-r cursor-pointer hover:bg-blue-500 hover:text-blue-50">
              + </span>
          </div>
          <button wire:click='edit()' >edit</button>
          <div class="flex items-center space-x-4">
            <p class="text-sm" x-text='total'></p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 duration-150 cursor-pointer hover:text-red-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
      </div>
    </div>
