
<div x-data="{pay: 0}"
class="pt-10 bg-gray-100 ">
    <h1 class="mb-5 text-2xl font-bold text-center">Cart Items</h1>

    @if($cart->products->count())
      <div class="justify-center max-w-5xl px-6 mx-auto md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
          @foreach ($cart->products as $product)
          <livewire:cart-product :key='$product->id' :$product>
          @endforeach
    
    
        </div>
        <!-- Sub total -->
        <div class="h-full p-6 mt-6 bg-white border rounded-lg shadow-md md:mt-0 md:w-1/3">
          <div class="flex justify-between mb-2">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-700">$129.99</p>
          </div>
          <div class="flex justify-between">
            <p class="text-gray-700">Shipping</p>
            <p class="text-gray-700">$4.99</p>
          </div>
          <hr class="my-4" />
          <div class="flex justify-between">
            <p class="text-lg font-bold">Total</p>
            <div class="">
              <p class="mb-1 text-lg font-bold">$ <span x-text="pay" ></span> USD</p>
              <p class="text-sm text-gray-700">including VAT</p>
            </div>
          </div>
          <button 
           class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check
            out</button>
        </div>
      </div>

    @else
    <x-commons.null/>
    @endif
  </div>








