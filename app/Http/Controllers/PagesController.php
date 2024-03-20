<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Post;
use App\Models\Image;
use Auth;
class PagesController extends Controller
{
    public function landing(){
        return view('landing');
    }

    public function home(){
        return view('home')->with([
            'posts' => Post::get()->take(5),
        ]);
    }
    public function about(){
        return view('about')->with([
            'posts' => Post::get()->take(4),
        ]);    }
    public function store(){
        $carouselProducts = Product::where('original_price' , '<>' , 'new_price')->get();
        $products = Product::get();
        return view('store')->with([
            'carouselProducts' => $carouselProducts,
            'products' => $products,
        ]);
    }
    public function products(){
        if (Auth::user() && Auth::user()->role == 1) {
            $products = Product::get();
        return view('admin.views.products')->with([
            'products' => $products,
        ]);
        }
        else{
            return redirect()->route('landing');
        }
        
    }

    public function orders(){
        if (Auth::user() && Auth::user()->role == 1) {
            $orders = Order::get();
            return view('admin.views.orders')->with([
                'orders' => $orders,
            ]);
        }
        else{
            return redirect()->route('landing');
        }
        
    }

   
}
