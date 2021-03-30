<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\product;
use App\Models\HomeCategory;
use App\Models\category;
use App\Models\sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $Lproducts = product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.home-component',['sliders'=>$sliders,'Lproducts'=>$Lproducts])->layout('layouts.base');
    }
}
