<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'order_item')->withPivot('quantity', 'note', 'price');
    }

    public function getSubTotalAttribute($value)
    {   
        $subtotal = 0;
        foreach($this->items as $purchased_item){
            $subtotal += $purchased_item->pivot->quantity * $purchased_item->pivot->price;
        }
        return $subtotal;
    }

    public function getTotalChangeAttribute($value)
    {   
        $total_change = 0;
        $total_change = $this->paid_price - $this->subtotal;
        return $total_change;
    }
}
