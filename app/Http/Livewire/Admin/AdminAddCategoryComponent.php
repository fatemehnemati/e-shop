<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\category;


class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public function generateSlug(){
        $this->slug = str::slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug' =>'required|unique:categories'
        ]);
    }
    public function storeCategory(){

        $this->validate([
            'name'=>'required',
            'slug' =>'required|unique:categories'
        ]);

        $category = new category();
        $category->name = $this->name;
        $category->slug = $this->slug;;
        $category->save();
        session()->flash('message', 'Category has been created');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}