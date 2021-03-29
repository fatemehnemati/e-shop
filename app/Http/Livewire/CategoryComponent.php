<?php

// namespace App\Http\Livewire;

// use Livewire\Component;

// class CategoryComponent extends Component
// {
//     public function render()
//     {
//         return view('livewire.category-component');
//     }
// }


namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pageSize;
    public $category_slug;

    public function mount($category_slug){
        $this->sorting ='default';
        $this->pageSize ='12';
        $this->category_slug = $category_slug;
    }

    public function store($produc_id,$product_name,$product_price){
        Cart::add($produc_id,$product_name,1,$product_price)->associate('App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting == "date"){
            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price"){
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == "price-desc"){
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::where('category_id',$category_id)->paginate($this->pageSize);
        }
        $categories = Category::all();
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
