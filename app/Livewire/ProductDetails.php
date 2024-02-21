<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductDetails extends Component
{

    public ?Product $product;
    public $stock = 0;
    public $count = 0;


    #[On('details')]
    public function details(string $id){
      $this->product =  Product::select('id','name', 'description', 'stock', 'price')
      ->where('id', $id)->with('images')->first();
      $this->stock = $this->product->stock;
    }
    

    public function order(string $product_id){
      if($this->count > 0 &&  $this->count <= $this->stock){
        $cart = Cart::where('user_id', Auth::user()->id)->where('active', true)->first();
        $cart->products()->syncWithoutDetaching([
          $product_id => [
          'cant'=> $this->count,
          'sum'=> $this->count * $this->product->price
        ]
      ]);
      }
        $this->dispatch('notification', 
        "Se agrego {$this->count} de {$this->product->name} a tu carrito");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
