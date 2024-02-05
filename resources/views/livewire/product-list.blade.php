
<div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Sección: {{request('section', 'Todos')}}</h3>
        <span class="mt-3 text-sm text-gray-500">200+ Products</span>
        {{auth()->guest()? 'si': 'mo'}}

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($this->products as $product)
                <x-products.product-item :$product/>
            @endforeach
        </div>

        {{-- pagination --}}
        <div class="flex justify-center">
           {{$this->products->links()}}
        </div>
</div>
   

