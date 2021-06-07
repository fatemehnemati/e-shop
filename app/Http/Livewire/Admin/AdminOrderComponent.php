<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public function updateOrderStatus($order_id,$status){
        $order=Order::find($order_id);
        $order->status=$status;
        if($status == 'delivered'){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else if($status == "canceled"){
            $order->canceled = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('message','status has been updated');
    }
    public function render()
    {
        $orders=Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
