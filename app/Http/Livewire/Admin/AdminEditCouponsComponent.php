<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\coupon;

class AdminEditCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;

    public function mount($coupon_id){
        $coupon =Coupon::find($coupon_id);
        $this->coupon_id=$coupon->id;
        $this->code=$coupon->code;
        $this->type=$coupon->type;
        $this->value=$coupon->value;
        $this->cart_value=$coupon->cart_value;
        // $this->coupon_id=$coupon->coupon_id;

    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'
        ]);
    }
    public function editCoupon(){
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'
            ]);

            $coupon =Coupon::find($this->coupon_id);
            $coupon->code=$this->code;
            $coupon->type=$this->type;
            $coupon->value=$this->value;
            $coupon->cart_value=$this->cart_value;
            // $coupon->coupon_id=$this->coupon_id;
            $coupon->save();
            session()->flash('message','coupon has been edited');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupons-component')->layout('layouts.base');
    }
}
