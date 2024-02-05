<form class="flex flex-col md:flex-row gap-3">
    <div class="flex">
        <input type="text" placeholder="Buscar Producto"
            class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500">
        <button type="submit"
            class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">{{__('Buscar')}}</button>
    </div>

    

        <div class="md:min-w-52 group relative cursor-pointer py-1 border-2 border-sky-500">
    
            {{-- button --}}
            <div class="flex items-center justify-between  bg-white px-2">
                <a class="menu-hover  text-base font-medium text-black lg:mx-4" onClick="">
                    {{request('section', 'Selecciona Sección')}}   
                </a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </div>
    
            {{-- options --}}
            <div
                class="max-h-[50vh] overflow-y-scroll invisible absolute z-50 flex w-full flex-col bg-gray-100 py-1 px-4 text-gray-800 shadow-xl group-hover:visible">
    
                @foreach ($sections as $section)
                    <a wire:navigation href="{{route('products.index', ['section'=> $section->name])}}"
                     class="my-2 block border-b border-gray-100 py-1 font-semibold text-gray-500 hover:text-black md:mx-2">
                    {{$section->name}}
                </a>
                @endforeach
            </div>
        </div>
 

        

     



</form>