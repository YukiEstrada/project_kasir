<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart 
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'quantity',
        'price',
        'image_path',
    ];

    public $items;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function _construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($items, $id) {
        $carts = [
            'quantity' => 0,
            'price' => $items->price,
            'items' => $items,
            'image_path' => $items,
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $carts = $this->items[$id];
            }
        }
        $carts['quantity']++;
        $carts['price'] = ((int)$items->price * (int)$carts['quantity']);
        $this->items[$id] = $carts;
        $this->totalQuantity++;
        $this->totalPrice += (int)$items->price;

    }

    
}
