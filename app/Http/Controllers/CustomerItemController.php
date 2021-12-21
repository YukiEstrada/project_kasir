<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerItemController extends Controller
{
    public function index()
    {
        $items = Item::all();  

        return view('user.category', ['items' => $items]);
    }

    public function getAddToCart (Request $request, $id) {
        $items = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $carts = new Cart($oldCart);
        $carts->add($items, $items->id);
        $request->session()->put('cart', $carts);
        // dd($request->session()->get('cart'));   
        return redirect()->route('user_category')->with('message', 'Product Added Successfully');
    }

    public function showCart(Request $request) {
        if (!Session::has('cart')) {
            return view('user.cart');
        }
        $oldCart = Session::get('cart');
        $carts = new Cart($oldCart);
        // $carts->item_id = $request->item_id;
        // $carts->quantity = $request->quantity;
        // $carts->price = $request->price;
        // $carts->save();
        return view('user.cart', [
            'items' => $carts->items, 
            'totalPrice' => $carts->totalPrice
        ]);
    }

    public function invoice()
    {
        
        return view('user.invoice');
    }

    public function printInvoice()
    {
        $items = Item::with('')->get();
        return view('user.invoice', compact(''));
    }
}
