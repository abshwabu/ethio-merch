<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCatagoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = str::slug($this->name);
    }
    public function storeCatagory()
    {
       $catagory = new Catagory();
       $catagory->name = $this->name;
       $catagory->slug = $this->slug;
       $catagory->save();
       session()->flash('message','Catagory has created');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-catagory-component')->layout('layouts.home');
    }
}
