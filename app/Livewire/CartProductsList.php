<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class CartProductsList extends Component
{

    public $cart;

    public $id;

    public function delete(string $id) {
        $this->cart->products()->detach($id);
        // dd($this->cart->products);
        // DB::table('cart_product')->where('product_id', $id)->where('cart_id', $this->cart->id)->delete(); 
        $this->dispatch('notification', 'Se Elimino el producto');
    }

    public function render()
    {
        try{
        $this->cart = Cart::where('user_id', Auth::user()->id)->with(['products'=> function ($query){
            $query->with('image');
        }])->findOrFail($this->id);
        
        }catch(ModelNotFoundException $exception){
            abort(404);
        }
        return view('livewire.cart-products-list');
    }
}
