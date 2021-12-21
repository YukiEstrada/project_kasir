<?php

namespace App\Http\Middleware;

use App\Models\Category; 
use Closure;
use Illuminate\Http\Request;

class ItemComponent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function render()
    {
        $items = Item::all();
        $category = Category::all();
        
        return view('user.sidebar', ['items'=> $items, 'category'=>$category]);
    }
}
