<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminEditTshirt extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-edit-tshirt')->layout('layouts.home');
    }
}
