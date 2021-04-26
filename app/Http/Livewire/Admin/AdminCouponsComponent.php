<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\coupon;


class AdminCouponsComponent extends Component
{
    public function deleteCoupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message','coupon has been deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons' => $coupons])->layout('layouts.base');
    }
}
