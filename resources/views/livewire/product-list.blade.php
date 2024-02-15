<div class="container px-6 mx-auto">
    <h3 class="text-2xl font-medium text-gray-700">Sección: {{$section != ''? $section : 'Todos' }}</h3>
    <span class="mt-3 text-gray-500 text-md">{{$search != '' ? "Busqueda: {$search}": '' }}</span>

    {{-- -----order----- --}}
    @if($search != '')
    <div class="flex items-center rounded-md shadow-sm">
        <span class="text-sm text-gray-500 ">Ordenar por Precio: </span>
        <button wire:click="$set('order', 'asc')"
            class="{{$order === 'asc' ? 'bg-slate-600': '' }} block w-[120px] text-center  text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-1  items-center">
            menor
        </button>
        <button wire:click="$set('order', 'desc')"
            class="{{$order === 'desc' ? 'bg-slate-600': '' }} block w-[120px] text-center  text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-1  items-center">
            mayor
        </button>
    </div>
    @endif

    @if($search != '' || $section != '')
    {{-- ---clean filters--- --}}
    <a wire:navigation href="{{route('products.index')}}"
        class="block w-[120px] text-center  text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-1  items-center">
        Limpiar filtros
    </a>
    @endif

    {{-- -----products----- --}}
    @if ($this->products->count())
    <div class="grid grid-cols-1 gap-6 my-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($this->products as $product)
        <x-products.product-item :$product wire:key='{{$product->id}}' />
        @endforeach
    </div>
    @else
    <x-commons.null/>
    @endif

    {{-- pagination --}}
    <div class="flex flex-col items-center ">
        {{$this->products->links()}}
    </div>
</div>