<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
   
   
    public $subtitle;
    public $price;
    public $link;
    
    public $image;
    
    public $newimage;
    public $slider_id;


    public function mount($slider_id)
    {
        $slider = HomeSlider::where('id',$slider_id)->first();

        $this->title=$slider->title;
       
        
        $this->subtitle=$slider->subtitle;
        $this->price=$slider->price;
        $this->link=$slider->link;
        $this->status=$slider->status;
       
        $this->image=$slider->image;
        
        $this->slider_id=$slider->id;

    }

   


    public function updateSlider()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
       
        $slider->save();
        session()->flash('message','slider have been updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.home');
    }
}
