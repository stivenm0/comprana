<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
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
    public $order = 'asc';


    #[On('search')]
    public function updateSearch(string $value)
    {
        $this->search = $value;
        $this->resetPage();
    }




    #[Computed()]
    public function products()  {
        $query = Product::select('id','name','slug', 'price', 'stock', 'section_id')->search($this->search)
        ->with(['image:product_id,name']);
        

        if($this->search != ''){
            $query->search($this->search)->orderBy('price', $this->order);
        }

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
