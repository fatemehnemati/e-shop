<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;

class ShopComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.base');
    }
}
