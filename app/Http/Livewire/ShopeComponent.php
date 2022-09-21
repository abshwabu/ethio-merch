<?php

namespace App\Http\Livewire;
use Cart;

use App\Models\Product;
use App\Models\Catagory;
use Livewire\Component;
use Livewire\withPagination;

class ShopeComponent extends Component
{
    public $sorting;
    public $pagesize;
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        // session()->flash('success_message','Item added in Wishlist');
        // return redirect()->route('product.cart');
    }
    use withPagination;
    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price')
        {
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else 
        {
            $products = Product::paginate($this->pagesize);
        }
        $catagories = Catagory::all();
        return view('livewire.shope-component',['products'=>$products, 'catagories'=>$catagories])->layout('layouts.home');
    }
}
