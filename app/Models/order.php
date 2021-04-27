<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table='orders';
    
    public function user(){
        return $this->belongsTo(user::class);
    }

    public function orderItem(){
        return $this->hasMany(orderItem::class);
    }

    public function shipping(){
        return $this->hasOne(shipping::class);
    }

    public function transaction(){
        return $this->hasOne(transaction::class);
    }
}
