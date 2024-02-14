<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CartList extends Component
{

    public $carts;

    public $user_id;

    #[Validate('required|min:4|max:15|unique:carts')] 
    public $name = '';

    public $id = '';

    public function active_cart(string $id) {
        Cart::where('active', true)->where('user_id', $this->user_id)->update(['active'=> false]);

        Cart::where('id', $id)->where('user_id', $this->user_id)->update(['active'=> true]);
    }


    public function void_cart(string $id){
        DB::table('cart_product')->where('cart_id', $id)->delete();
        $this->dispatch('notification', 'Se vació el carrito Correctamente');
    }

    public function edit_cart(){
        $this->validate();
        Cart::where('id', $this->id)->where('user_id', $this->user_id)->update(['name'=> $this->name]);
        $this->dispatch('notification', 'Se edito el carrito');
        $this->dispatch('close-edit');
        $this->reset();
    }


    public function render()
    {
        $this->user_id = Auth::user()->id;
        $this->carts = Cart::where('user_id', $this->user_id)->withCount('products')
        ->orderBy('active', 'desc')->get();
        return view('livewire.cart-list');
    }
}
