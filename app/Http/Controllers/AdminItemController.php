<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psy\Command\EditCommand;

class AdminItemController extends Controller
{
    public function index()
    {
        $items = item::withTrashed()->paginate(10);  

        return view('admin.data_menu', ['items' => $items]);
    }
    
    public function createMenu()
    {
        return view ('admin.Item_create');
    }

    public function updateMenu($id)
    {
        // mengambil data menu berdasarkan id yang dipilih 
        $items = item:: find($id);
         // passing data menu yang didapat ke view edit.blade.php
	    return view('admin.item_update',['items' => $items]);
    }

    public function deleteMenu ($id)
    {
        $items = Item::find($id);

        $items->delete();
        
        return redirect()->route('admin_data_menu')
        ->with('success','Product deleted successfully');
    }

    public function restoreMenu($id)
    {
        $items = Item::withTrashed()->find($id);

        $items->restore();
        
        return redirect()->route('admin_data_menu')
        ->with('success','Product restored successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         ]);
               
        $item = Item::find($id);
        
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $image_name = str_replace("+", "&", $request->name);
            $path = $request->file('image')->storeAs('image', $image_name . '.' . $extension, ['disk' => 'public']);
        
            $item->image_path = $path;
        }

        $item->name = $request->input('name');
        $item->category = $request->input('category');
        $item->price = $request->input('price');
       
        $extension = $request->file('image')->getClientOriginalExtension();
        $image_name = str_replace("+", "&", $request->name);
        $path = $request->file('image')->storeAs('image', $image_name . '.' . $extension, ['disk' => 'public']);
       
        $item->image_path = $path;
        $item->save();
 
        return redirect()->route('admin_data_menu')
        ->with('success','Product updated successfully');

    }

   public function submit(Request $request)
   {
        $rules = [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }

        $extension = $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('image', $request->name . '.' . $extension, ['disk' => 'public']);

        $save = new Item();

        $save->name = $request->input('name');
        $save->category = $request->input('category');
        $save->price = $request->input('price');
        $save->image_path = $path;
        $save->save();

        return redirect()->route('admin_data_menu')
        ->with('success','Product created successfully');

       
    }
}
