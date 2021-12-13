<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->start_date && $request->end_date) 
        {   
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            
            if($end_date >= $start_date){
                $orders = Order::whereBetween(DB::raw('DATE(created_at)'),[$start_date,$end_date])->paginate(10);
            }else{
                return redirect()->back()->withErrors(['You cannot input date that is in the past']);
            }
        }
        else{
            $orders = Order::paginate(10); 
        } 

        return view('admin.home', ['orders' => $orders]);
    }

    public function periode()
    {
        if (request()->start_date || request()->end_date) 
        {   
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            
            if($end_date > $start_date){
                $data = Order::whereBetween('created_at',[$start_date,$end_date])->get();
            
                return view('admin.home_periode', ['data' => $data]);
            }else{
                $data = Order::latest()->get();    

                return redirect()->back()->withErrors(['You cannot input date that is in the past']);

            }
           
        }else 
        {
            $data = Order::latest()->get();    

            return redirect()->back()->withErrors(['Please input the dates']);
        } 
        
    }
}
