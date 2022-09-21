<?php

namespace App\Http\Livewire;
use Cart;

use App\Models\Product;
use App\Models\Catagory;
use Livewire\Component;
use Livewire\withPagination;

class CatagoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $catagory_slug;

    public function mount($catagory_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->catagory_slug = $catagory_slug;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }
    use withPagination;
    public function render()
    {
        $catagory = Catagory::where('slug',$this->catagory_slug)->first();
        $catagory_id = $catagory->id;
        $catagory_name = $catagory->name;


        if($this->sorting == 'date')
        {
            $products = Product::where('catagory_id',$catagory_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price')
        {
            $products = Product::where('catagory_id',$catagory_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::where('catagory_id',$catagory_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else 
        {
            $products = Product::where('catagory_id',$catagory_id)->paginate($this->pagesize);
        }
        $catagories = Catagory::all();
        return view('livewire.catagory-component',['products'=>$products, 'catagories'=>$catagories,'catagory_name'=>$catagory_name])->layout('layouts.home');
    }
}
