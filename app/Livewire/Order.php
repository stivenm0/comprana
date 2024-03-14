<?php

namespace App\Livewire;

use App\Events\CreateOrderEvent;
use App\Models\Order as ModelsOrder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Order extends Component
{

    public $step = 1;

    public $total = 0;

    public $user;


    #[Validate('required|min:10|max:10')]
    public $phone =1234567891;
    #[Validate('required|min:5|max:255')]
    public $address = "p into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    public $cart;

    public function mount(){
        $this->user = Auth::user();

        foreach($this->products as $product){
            $this->total += $product->pivot->cant * $product->price;
        }

        // dd($this->total);
        // $this->phone = $user->phone;
        // $this->address = $user->address;
    }

    #[Computed(true)]
    public function products() {
        return  $this->cart->products()->select('product_id','name', 'price', 'stock')
        ->where('stock', '>', 0)->get();
    }

    public function contacts(){
        $this->validate();
        $this->step= 2;
    }

    public function back(){
        $this->step = 1;
    }

    public function pay(){
        $order = ModelsOrder::create([
            'user_id' => $this->user->id,
            'cart_id' => $this->cart->id,
            'phone' => $this->phone,
            'address' => $this->address,
            'total' => $this->total,
        ]);

         CreateOrderEvent::dispatch($this->products, $order);

         $this->dispatch('notification', 
        "Compra realizada");
    }




    public function render()
    {
        return view('livewire.order');
    }
}
