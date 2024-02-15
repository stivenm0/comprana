<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Carrito
    </h2>
  </x-slot>


  <livewire:cart-products-list>




  {{-- <div class="container px-6 mx-auto">
    <h3 class="text-2xl font-medium text-gray-700">Checkout</h3>
    <div class="flex flex-col mt-8 lg:flex-row">
      <div class="order-2 w-full lg:w-1/2">
        <div class="flex items-center">
          <button class="flex text-sm text-blue-500 focus:outline-none"><span
              class="flex items-center justify-center w-5 h-5 mr-2 text-white bg-blue-500 rounded-full">1</span>
            Contacts</button>
          <button class="flex ml-8 text-sm text-gray-700 focus:outline-none"><span
              class="flex items-center justify-center w-5 h-5 mr-2 border-2 border-blue-500 rounded-full">2</span>
            Shipping</button>
          <button class="flex ml-8 text-sm text-gray-500 focus:outline-none" disabled><span
              class="flex items-center justify-center w-5 h-5 mr-2 border-2 border-gray-500 rounded-full">3</span>
            Payments</button>
        </div>
        <form class="mt-8 lg:w-3/4">
          <div>
            <h4 class="text-sm font-medium text-gray-500">Delivery method</h4>
            <div class="mt-6">
              <button
                class="flex items-center justify-between w-full p-4 bg-white border-2 border-blue-500 rounded-md focus:outline-none">
                <label class="flex items-center">
                  <input type="radio" class="w-5 h-5 text-blue-600 form-radio" checked><span
                    class="ml-2 text-sm text-gray-700">MS Delivery</span>
                </label>

                <span class="text-sm text-gray-600">$18</span>
              </button>
              <button
                class="flex items-center justify-between w-full p-4 mt-6 bg-white border rounded-md focus:outline-none">
                <label class="flex items-center">
                  <input type="radio" class="w-5 h-5 text-blue-600 form-radio"><span
                    class="ml-2 text-sm text-gray-700">DC Delivery</span>
                </label>

                <span class="text-sm text-gray-600">$26</span>
              </button>
            </div>
          </div>
          <div class="mt-8">
            <h4 class="text-sm font-medium text-gray-500">Delivery address</h4>
            <div class="flex mt-6">
              <label class="block w-3/12">
                <select
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                  <option>NY</option>
                  <option>DC</option>
                  <option>MH</option>
                  <option>MD</option>
                </select>
              </label>
              <label class="flex-1 block ml-3">
                <input type="text"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                  placeholder="Address">
              </label>
            </div>
          </div>
          <div class="mt-8">
            <h4 class="text-sm font-medium text-gray-500">Date</h4>
            <div class="flex mt-6">
              <label class="flex-1 block">
                <input type="date"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                  placeholder="Date">
              </label>
            </div>
          </div>
          <div class="flex items-center justify-between mt-8">
            <button
              class="flex items-center text-sm font-medium text-gray-700 rounded hover:underline focus:outline-none">
              <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
              </svg>
              <span class="mx-2">Back step</span>
            </button>
            <button
              class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
              <span>Payment</span>
              <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
              </svg>
            </button>
          </div>
        </form>
      </div>
      <div class="flex-shrink-0 order-1 w-full mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
        <div class="flex justify-center lg:justify-end">
          <div class="w-full max-w-md px-4 py-3 border rounded-md">
            <div class="flex items-center justify-between">
              <h3 class="font-medium text-gray-700">Order total (2)</h3>
              <span class="text-sm text-gray-600">Edit</span>
            </div>
            <div class="flex justify-between mt-6">
              <div class="flex">
                <img class="object-cover w-20 h-20 rounded"
                  src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                  alt="">
                <div class="mx-3">
                  <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                  <div class="flex items-center mt-2">
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                      <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                      </svg>
                    </button>
                    <span class="mx-2 text-gray-700">2</span>
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                      <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <span class="text-gray-600">20$</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}


  <x-commons.footer />
</x-app-layout>