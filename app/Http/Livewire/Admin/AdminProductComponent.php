<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;



class AdminProductComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(10);

        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}