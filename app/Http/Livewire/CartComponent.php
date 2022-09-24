<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
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
    public function checkout(){
        if (Auth::check()) {
            

            return redirect('/checkout');

        } else {

            return redirect('/login');
        }
        
    }
    public function setAmountForCheckout()
    {
        // if(!Cart::instance('cart')->count > 0)
        // {
        //     session()->forget('checkout');
        //     return;
        // }
        session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal,
            'tax'=>Cart::instance('cart')->tax,
            'total'=>Cart::instance('cart')->total,
        ]);
        
    }
    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.home');
    }
}
