<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Order extends Component
{

    public $step = 1;

    public $total =0;

    public $cart;

    #[Validate('required|min:10|max:10')]
    public $phone =1234567891;
    #[Validate('required|min:5|max:255')]
    public $address = "loremfsdfadf";

    public $products;

    public function mount(){
        $user = Auth::user();

        // $this->phone = $user->phone;
        // $this->address = $user->address;
    }

    public function contacts(){
        $this->validate();

        $this->products = $this->cart->products()->select('name', 'price')->get();
        $this->step= 2;
    }

    public function back(){
        $this->step = 1;
    }

    public function pay(){
        
    }




    public function render()
    {
        return view('livewire.order');
    }
}
