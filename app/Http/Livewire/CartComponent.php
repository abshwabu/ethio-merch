<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    
    Public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    Public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty -1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    Public function destroy($rowId)
    {
        
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.home');
    }
}
