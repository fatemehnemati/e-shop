<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\category;

class DetailsComponent extends Component
{
    public $slug ;
    
    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popularProducts = Product::inRandomOrder()->limit(4)->get();
        $relatedProducts = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['product'=>$product,'popularProducts'=>$popularProducts,'relatedProducts'=>$relatedProducts])->layout('layouts.base');
    }
}
