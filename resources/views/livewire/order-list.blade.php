<!-- component -->
<div class="container p-8 py-10 mx-auto antialiased ">
   
   @forelse ($this->orders as $order)
   @php
      $color = match($order->status){
         'Procesando' => 'yellow-600',
         'Enviado' => 'blue-600',
         'Entregado' => 'green-600',
         'No Entregado' => 'gray-800',
         'Cancelado' => 'red-600'
      }
   @endphp
   <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5 h-30">
      <div class="flex flex-wrap p-3 border-l-8 border-{{$color}}">
         <div class="pr-3 ml-3 space-y-1 sm:border-r-2">
            <div class="text-sm font-semibold leading-5"><span class="text-xs font-normal leading-4 text-gray-500">
                  ID#</span> {{$order->id}}</div>

            <div class="text-sm font-semibold leading-5">
               {{$order->created_at->format('M j. g:i A') }}
            </div>
         </div>
         <div class="flex-1">
            <div class="pr-3 ml-3 space-y-1 sm:border-r-2">
               <div class="text-base font-normal leading-6">{{$order->cart->name}}</div>
               <div class="text-sm font-normal leading-4"><span class="text-xs font-normal leading-4 text-gray-500">
                     Teléfono</span>
                     {{$order->phone}}
               </div>
               <div class="text-sm font-normal leading-4"><span class="text-xs font-normal leading-4 text-gray-500">
                     Destino</span>
                     {{$order->address}}
               </div>
            </div>
         </div>
         <div>
            <div class="w-20 p-1 my-5 ml-3 bg-{{$color}}">
               <div class="text-xs font-semibold leading-4 text-center text-yellow-100 uppercase">
                  {{$order->status}}
               </div>
            </div>
         </div>
      </div>
   </div>
   @empty
   <x-commons.null />
   @endforelse

</div>