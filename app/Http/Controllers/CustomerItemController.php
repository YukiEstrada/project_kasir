<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class CustomerItemController extends Controller
{
    public function showMenu(Request $request)
    { 
        $items = new Item;

        $category = $request->category;
        if($category != null){
            $items = $items->where('category', $category);
        }

        if($request->search != null){  
            $search = $request->search;
            $items = $items->where('name','like',"%".$search."%");
        }
        
        $items = $items->get(); 
        
        $has_item = Cart::count();
        return view('user.category', compact('items'));
    }
    
    public function search(Request $request)
	{
		$search = $request->search;
 
		$items = Item::get('name')
        ->where('name','like',"%".$search."%");
	
		return view('user.category',['item' => $items]);
 
	}

    public function checkout(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'cart_id' => 'required|array',
            'quantity' => 'required|array',
            'paid_price' => 'required|numeric|min:1', 
        ]);
 
        if($validation->fails()){
            return redirect()->back()->withErrors($validation->errors()->first());
        }

        $submitted_cart_id = $request->cart_id;
        $submitted_quantity = $request->quantity;
        foreach($submitted_cart_id as $index => $cart_id){
            $cart = Cart::find($cart_id);
            $cart->quantity = $submitted_quantity[$index];
            $cart->save();
        }

        $carts = Cart::get();

        $total_price = 0;
        foreach($carts as $cart){
            $total_price += $cart->quantity * $cart->item->price;
        }
        if($request->paid_price < $total_price){
            return redirect()->back()->withErrors('Paid money is not enough!');
        }

        $order = new Order;

        $takeaway = (bool) $request->takeaway ?? false;
        $date = date('Ymd');
        $generate_id = $date;

        if($takeaway != true){
            $generate_id .= '-01';
        }
        else{
            $generate_id .= '-02';
        }

        $order_sequence = Order::whereDate('created_at', date('Y-m-d'))->count() + 1;
        $generate_id .= '-' .$order_sequence;

        $order->ref_no = $generate_id;
        $order->paid_price = $request->paid_price;
        $order->type = $takeaway;
        $order->save();

        foreach($carts as $cart){ 
            $order->items()->attach($cart->item_id, 
                [
                    'price' => $cart->item->price,
                    'note' => null,
                    'quantity' => $cart->quantity,
                ]
            );
        }

        $delete = Cart::truncate();

        return redirect()->route('user_menu')->with('success', 'Order has been successfully created!');
    }

    public function showInvoice(Request $request)
    {
        $invoice = Order::get();
    }

    public function showCart(Request $request)
    {
        $carts = Cart::with('item')->get();

        $total_price = 0;
        foreach($carts as $cart){
            $total_price += $cart->quantity * $cart->item->price;
        }
 
        return view('user.cart', compact('carts', 'total_price'));
    }

    public function deleteMenuCart(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        
        return redirect()->back()->with('success', 'Item has been deleted from cart');        
       
    }

    public function addItemToCart(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'item_id' => 'required',
            'quantity' => 'required|numeric|min:1', 
        ]);
 
        if($validation->fails()){
            return redirect()->back()->withErrors($validation->errors()->first());
        }

        $item_exists = Cart::where('item_id', $request->item_id)->first();
        if($item_exists){
            $cart_item = $item_exists;
            $cart_item->quantity += $request->quantity;
            $cart_item->save();
        }
        else{
            $cart_item = new Cart();
            $cart_item->item_id = $request->item_id;
            $cart_item->quantity = $request->quantity;
            $cart_item->save();
        }
        

        return redirect()->back()->with('success', 'Item has been added to cart');
    }
}
