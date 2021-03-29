<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pageSize;

    public function mount(){
        $this->sorting ='default';
        $this->pageSize ='12';
    }

    public function store($produc_id,$product_name,$product_price){
        Cart::add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if($this->sorting == "date"){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price"){
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price-desc"){
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::paginate($this->pageSize);
        }
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.base');
    }
}
