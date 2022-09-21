<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;
    public function mount()
    {
        $this->product_cat = 'All category';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    public function render()
    {
        $catagories = Catagory::all();
        return view('livewire.header-search-component',['catagories' => $catagories]);
    }
}
