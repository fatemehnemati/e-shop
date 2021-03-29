<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\category;
use Cart;

class DetailsComponent extends Component
{
    public $slug ;
    
    public function mount($slug){
        $this->slug = $slug;
    }
    public function store($produc_id,$product_name,$product_price){
        Cart::add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popularProducts = Product::inRandomOrder()->limit(4)->get();
        $relatedProducts = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['product'=>$product,'popularProducts'=>$popularProducts,'relatedProducts'=>$relatedProducts])->layout('layouts.base');
    }
}
