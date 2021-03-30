<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberOfProducts ;

    public function mount(){
        $category=HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberOfProducts = $category->no_of_products;
    }

    public function updateHomeCategory(){
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->numberOfProducts;
        $category->save();
        session()->flash('message','homecategory has been added');
    }

    public function render()
    {
        $categories = category::all();

        return view('livewire.admin.admin-home-category-component',['categories' => $categories])->layout('layouts.base');
    }
}
