<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $catagory_id;
    public $newimage;
    public $product_id;


    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();

        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->description=$product->description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->SKU=$product->SKU;
        $this->stock_status=$product->stok_status;
        $this->featured=$product->featured;
        $this->quantity=$product->quantity;
        $this->image=$product->image;
        $this->catagory_id=$product->catagory_id;
        $this->product_id=$product->id;

    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stok_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->catagory_id = $this->catagory_id;
        $product->save();
        session()->flash('message','Product have been updated');
    }

    public function render()
    {
        $catagories = Catagory::all();
        return view('livewire.admin.admin-edit-product-component',['catagories'=>$catagories])->layout('layouts.home');
    }
}
