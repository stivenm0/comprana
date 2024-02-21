<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartProduct extends Component
{

    public $product;
    public $cant;
    public $stock;



    public function edit() {
        dd($this->cant, $this->product->id);
    }



    public function render()
    {
        $this->cant = $this->product->pivot->cant;
        $this->stock = $this->product->stock;
        return view('livewire.cart-product');
    }
}
