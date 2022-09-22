<?php

namespace App\Http\Livewire;
use Cart;

use Livewire\Component;
use App\Models\Product;

class DetailsComponent extends Component
{
    public $slug;
    
    public $qty;


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }



    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if ($this->qty > 1) {

            $this->qty--;

        }
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('product.cart');
    }



    


    public function render()
    {
       
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('catagory_id',$product->catagory_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products])->layout('layouts.home');
    }
}
