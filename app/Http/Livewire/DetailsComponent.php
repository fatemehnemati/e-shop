<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\category;
use Cart;
use App\Models\sale;

class DetailsComponent extends Component
{
    public $slug ;
    public $qty;
    
    public function mount($slug){
        $this->slug = $slug;
        $this->qty=1;
    }
    public function increaseQuantity(){
        $this->qty++;
    }
    public function decreaseQuantity(){
        if($this->qty>1){
            $this->qty--;

        }
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popularProducts = Product::inRandomOrder()->limit(4)->get();
        $relatedProducts = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popularProducts'=>$popularProducts,'relatedProducts'=>$relatedProducts,'sale'=>$sale])->layout('layouts.base');
    }
}
