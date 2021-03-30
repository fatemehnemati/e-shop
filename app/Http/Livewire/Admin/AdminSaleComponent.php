<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\sale;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;
    public function mount(){
        $sale = sale::find(1);
        $this->sale_date =$sale->sale_date;
        $this->status = $sale->status;
    }
    public function updateSale(){
        $sale = sale::find(1);
        $sale->status = $this->status;
        $sale->sale_date = $this->sale_date;
        $sale->save();
        session()->flash('message','record has been updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}
