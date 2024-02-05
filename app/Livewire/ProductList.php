<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{

    use WithPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $section = '';

    #[Url()]
    public $order = '';
    

    #[Computed()]
    public function products()  {
        $query = Product::select('id','name','slug', 'price', 'stock', 'section_id')->search($this->search)
        ->with(['image:product_id,name']);
        

        if($this->section === ''){
            $query->with('section:id,name')->orderBy('id', 'desc');
        }else{
            $query->whereHas('section', function($query){
                $query->where('name', $this->section);
            });
        }
        

        return $query->paginate(6);
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
