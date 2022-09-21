<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCatagoryComponent extends Component
{
    public $selected_categories= [];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberofproducts = $category->no_of_products;
    }

    public function updateCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        session()->flash('message','Category updated!');
    }

    public function render()
    {
        $categories = Catagory::all();
        return view('livewire.admin.admin-home-catagory-component',['categories'=>$categories])->layout('layouts.home');
    }
}
