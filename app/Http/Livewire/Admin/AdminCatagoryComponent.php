<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCatagoryComponent extends Component
{
   
    use WithPagination;
    public function deleteCatagory($id)
    {
        $catagory = Catagory::find($id);
        $catagory->delete();
        session()->flash('message','Catagory has been deleted');
    }
    public function render()
    {

        $catagories = Catagory::paginate(5);
        return view('livewire.admin.admin-catagory-component',['catagories'=>$catagories])->layout('layouts.home');
    }
}
