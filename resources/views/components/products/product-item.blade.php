<div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
    <div class="flex items-end justify-end w-full h-56 bg-cover" style="background-image: url('{{asset('storage/images/'.$product->image->name)}}')">
        <button class="p-2 mx-5 -mb-4 text-white bg-blue-600 rounded-full hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </button>
    </div>
    <div class="px-5 py-3">
        @include('products.partials.section-badge')
        <h3 class="text-gray-700 uppercase"> {{$product->name}}<br/></h3>
        <span class="mt-2 text-gray-500">{{$product->price}}</span>
        <span class="mt-2 text-red-500">{{$product->stock>1? 'agotado': 'si hay'}}</span>
    </div>
</div>