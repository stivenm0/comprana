<div class="w-full flex justify-center mx-auto">
    <ul class="flex gap-3 my-2 flex-wrap justify-center px-4 md:px-8 max-w-lg">
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{!request()->has('status') ? 'outline outline-teal-600': '' }}
        ">
            <a href="{{route('orders.index')}}" wire:navigate>
                Todos
            </a>
        </li>
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{request('status') === 'Procesando' ? 'outline outline-teal-600': '' }}
        ">
            <a href="{{route('orders.index', ['status'=> 'Procesando'])}}" wire:navigate>
                Procesando
            </a>
        </li>
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{request('status') === 'Enviado' ? 'outline outline-teal-600': '' }}
        ">
            <a href="{{route('orders.index', ['status'=> 'En Camino'])}}" wire:navigate>
                En Camino
            </a>
        </li>
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{request('status') === 'Entregado' ? 'outline outline-teal-600': '' }}
        ">
            <a href="{{route('orders.index', ['status'=> 'Entregado'])}}" wire:navigate>
                Entregado
            </a>
        </li>
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none  
        hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{request('status') === 'Cancelado' ? 'outline outline-teal-600': '' }}">
            <a href="{{route('orders.index', ['status'=> 'Cancelado'])}}" wire:navigate>
                Cancelado
            </a>
        </li>
        <li class="px-2 py-1 md:text-lg relative bg-gray-200 rounded-lg select-none hover:shadow hover:shadow-teal-500 hover:outline hover:outline-teal-600 hover:cursor-pointer
        {{request('status') === 'No Entregado' ? 'outline outline-teal-600': '' }}
        ">
            <a href="{{route('orders.index', ['status'=> 'No Entregado'])}}" wire:navigate>
                No Entregado
            </a>
        </li>

    </ul>
</div>