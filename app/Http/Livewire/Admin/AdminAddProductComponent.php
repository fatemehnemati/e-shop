<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount(){
        $this->stock_status='instock';
        $this->featured='0';
    }
    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }
    public function addProduct(){
        $product=new product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->sale_price=$this->sale_price;
        $product->regular_price=$this->regular_price;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','product has been added');
    }
    public function render()
    {
        $categories=category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}