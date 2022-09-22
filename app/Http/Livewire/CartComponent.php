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
        $this->emitTo('cart-count-component','refreshComponent');

    }
    Public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty -1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    Public function destroy($rowId)
    {
        
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');

        session()->flash('success_message','Item has been removed');
        
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.home');
    }
}
