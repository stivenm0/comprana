<?php

namespace App\Livewire;

use App\Events\CreateOrderEvent;
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

    public $total =0;

    #[Validate('required|min:10|max:10')]
    public $phone =1234567891;
    #[Validate('required|min:5|max:255')]
    public $address = "loremfsdfadf";

    public $cart;

    public function mount(){
        // $user = Auth::user();

        // $this->phone = $user->phone;
        // $this->address = $user->address;
    }

    #[Computed(true)]
    public function products() {
        return  $this->cart->products()->select('name', 'price')->get();
    }

    public function contacts(){
        $this->validate();
        $this->step= 2;
    }

    public function back(){
        $this->step = 1;
    }

    public function pay(){
        // dd($this->products);
         CreateOrderEvent::dispatch($this->products);
    }




    public function render()
    {
        return view('livewire.order');
    }
}
