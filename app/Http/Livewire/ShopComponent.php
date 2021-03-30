<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pageSize;
    public $min_price;
    public $max_price;

    public function mount(){
        $this->sorting ='default';
        $this->pageSize ='12';
        $this->min_price=1;
        $this->max_price=1000;
    }

    public function store($produc_id,$product_name,$product_price){
        Cart::instance('cart')->add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }
    public function addToWishList($produc_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        
    }
    public function render()
    {
        if($this->sorting == "date"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price-desc"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }
        $categories = Category::all();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
