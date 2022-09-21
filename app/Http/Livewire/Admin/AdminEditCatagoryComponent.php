<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;
class AdminEditCatagoryComponent extends Component
{
    public $catagory_slug;
    public $catagory_id;
    public $name;
    public $slug;
    public function mount($catagory_slug)
    {
        $this->catagory_slug = $catagory_slug;
        $catagory = Catagory::where('slug',$catagory_slug)->first();
        $this->catagory_id = $catagory->id;
        $this->name = $catagory->name;
        $this->slug = $catagory->slug;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updateCatagory()
    {
        $catagory = Catagory::find($this->catagory_id);
        $catagory->name = $this->name;
        $catagory->slug = $this->slug;
        $catagory->save();
        session()->flash('message','Catagory has been updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-catagory-component')->layout('layouts.home');
    }
}
