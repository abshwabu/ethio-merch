<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeCompnent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Catagory::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        return view('livewire.home-compnent',['sliders'=>$sliders,'latestproducts'=>$latestproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts])->layout('layouts.home');
    }
}
