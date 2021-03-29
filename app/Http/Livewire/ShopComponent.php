<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($produc_id,$product_name,$product_price){
        Cart::add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.base');
    }
}
