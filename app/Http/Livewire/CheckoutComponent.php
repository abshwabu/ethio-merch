<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $country;
    public $city;
    public $sub_city;
    public $woreda;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_country;
    public $s_city;
    public $s_sub_city;
    public $s_woreda;

    public $paymentmode;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname'=>'required',
            'lastname'=>'required',
            'mobile'=>'required|numeric',
            'email'=>'required|email',
            'line1'=>'required',
            'country'=>'required',
            'city'=>'required',
            'sub_city'=>'required',
            'woreda'=>'required',
            'paymentmode'=>'required'
        ]);
        if ($this->ship_to_different) {
            $this->validateOnly($fields,[
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_mobile'=>'required|numeric',
                's_email'=>'required|email',
                's_line1'=>'required',
                's_country'=>'required',
                's_city'=>'required',
                's_sub_city'=>'required',
                's_woreda'=>'required',
                'paymentmode'=>'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'mobile'=>'required|numeric',
            'email'=>'required|email',
            'line1'=>'required',
            'country'=>'required',
            'city'=>'required',
            'sub_city'=>'required',
            'woreda'=>'required',
            'paymentmode'=>'required',

        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
       $order->firstname = $this->firstname;
       $order->lastname = $this->lastname;
       $order->mobile = $this->mobile;
       $order->email = $this->email;
       $order->line1 = $this->line1;
       $order->line2 = $this->line2;
       $order->country = $this->country;
       $order->city = $this->city;
       $order->sub_city = $this->sub_city;
       $order->woreda = $this->woreda;
       $order->status = 'ordered';
       $order->is_shipping_different = $this->ship_to_different ? 1:0;
       $order->save();

       foreach(Cart::instance('cart')->content() as $item)
       {
        $orderItem = new OrderItem();
        $orderItem->product_id = $item->id;
        $orderItem->order_id = $order->id;
        $orderItem->price = $item->price;
        $orderItem->quantity = $item->qty;
        $orderItem->save();
        
       }
       if ($this->ship_to_different) {
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_mobile'=>'required|numeric',
                's_email'=>'required|email',
                's_line1'=>'required',
                's_country'=>'required',
                's_city'=>'required',
                's_sub_city'=>'required',
                's_woreda'=>'required',
                'paymentmode'=>'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->country = $this->s_country;
            $shipping->city = $this->s_city;
            $shipping->sub_city = $this->s_sub_city;
            $shipping->woreda = $this->s_woreda;
            $shipping->save();


       }

       if($this->paymentmode == 'cod')
       {
         $transaction = new Transaction();
         $transaction->user_id = Auth::user()->id;
         $transaction->order_id = $order->id;
         $transaction->mode = 'cod';
         $transaction->status = 'pending';
         $transaction->save();
       }
       $this->thankyou = 1;
       Cart::instance('cart')->destroy();
       session()->forget('checkout');

    }
    public function varifayCheckout()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->varifayCheckout();
        return view('livewire.checkout-component')->layout('layouts.home');
    }
}
