<?php

namespace App\Livewire;

use Livewire\Component;

class CartProduct extends Component
{

    public $product;
    public $cant;



    public function edit() {
        dd($this->cant, $this->product->id);
    }

    public function render()
    {
        $this->cant = $this->product->pivot->cant;
        return view('livewire.cart-product');
    }
}
