<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\category;

class AdminCategoryComponent extends Component
{
    use withPagination;
    public function render()
    {
        $categories= Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
