<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartProductsList extends Component
{

    public $cart;

    public function render()
    {
        $this->cart = Cart::with(['products'=> function ($query){
            $query->with('image');
        }])->find(request('id'));
        return view('livewire.cart-products-list');
    }
}
