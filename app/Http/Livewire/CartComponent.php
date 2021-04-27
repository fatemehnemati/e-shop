<?php

namespace App\Http\Livewire;
use Cart;
use App\Models\product;
use Livewire\Component;
use App\Models\coupon;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $haveCouonCode;
    public $CouponCode;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $discount;

    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        session()->flash('success_message','All Items has been removed');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function switchToSaveFolder($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');

    }
    public function moveToCart($rowId){
        $item=Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been added to cart');
    }
    public function deleteFromForLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed');

    }
    public function applyCouponCode(){
        $coupon=Coupon::where('code',$this->CouponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('coupon_message','coupon code id invalid');
            return;
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ]);
    }
    public function calculateDiscount(){
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount=session()->get('coupon')['value'];
            }else{
                $this->discount=(cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount=cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount + $this->taxAfterDiscount;

        }
    }
    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function render()
    {
        if(session()->has('coupon')){
            if(cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscount();
            }
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
