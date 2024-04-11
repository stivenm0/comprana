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
    #[Locked] 
    public $user;


    #[Validate('required|min:10|max:10')]
    public $phone =1234567891;
    #[Validate('required|min:5|max:255')]
    public $address = "p into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lor";

    public $cart;

    public function mount(){
        $this->user = Auth::user();


        // $this->phone = $user->phone;
        // $this->address = $user->address;
    }


    public function contacts(){
        $this->validate();
        $order = ModelsOrder::create([
            'user_id' => $this->user->id,
            'cart_id' => $this->cart->id,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        return redirect(route('orders.pay',[
            'id'=> $this->cart->id,
            'order'=> $order->id,
        ]));

    }

    public function render()
    {
        return view('livewire.order');
    }
}
