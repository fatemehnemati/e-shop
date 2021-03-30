<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\product;
use App\Models\HomeCategory;
use App\Models\category;
// use App\Models\sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $Lproducts = product::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $Sproducts = product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        // $sale = sale::find(1);
        return view('livewire.home-component',['sliders'=>$sliders,'Lproducts'=>$Lproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'Sproducts'=>$Sproducts])->layout('layouts.base');
    }
}
