<?php

namespace App\Http\Livewire\User;

use App\Models\orderItem;
use App\Models\review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id){
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'rating' =>'required',
            'comment' =>'required'
        ]);
    }

    public function addReview(){
        $this->validate([
            'rating' =>'required',
            'comment' =>'required'
        ]);
        $review = new review();
        $review->rating =$this->rating;
        $review->comment =$this->comment;
        $review->order_items_id =$this->order_item_id;
        $review->save();
        $orderdItem = OrderItem::find($this->order_items_id);
        $orderdItem->rstatus = true;
        $orderdItem->save();
        session()->flash('message','comment is added');
    }
    public function render()
    {
        $order_item = orderItem::find($this->order_item_id);

        return view('livewire.user.user-review-component',['order_item'=>$order_item])->layout('layouts.base');
    }
}
