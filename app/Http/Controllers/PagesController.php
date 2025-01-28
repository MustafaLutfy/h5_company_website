<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Store;
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
        $carouselProducts = Product::orderBy('new_price')->where('original_price' , '<>' , 'new_price')->take(5)->get();
        $products = Product::where('store_id', '7')->orderBy('product_order', 'DESC')->get();
        $stores = Store::get();
        return view('store')->with([
            'carouselProducts' => $carouselProducts,
            'products' => $products,
            'stores' => $stores,
        ]);
    }
    public function products(){
        if (Auth::user() && Auth::user()->role == 1) {
            $products = Product::orderBy('product_order','DESC')->get();
            $stores = Store::get();
        return view('admin.views.products')->with([
            'products' => $products,
            'stores' => $stores,
        ]);
        }
        else{
            return redirect()->route('landing');
        }  
    }

    public function productEdit($id){
        $editProduct = Product::find($id);
        $discount = ($editProduct->original_price - $editProduct->new_price) / $editProduct->original_price;
        if (Auth::user() && Auth::user()->role == 1) {
            $stores = Store::get();
            $product = Product::find($id);
        return view('admin.views.products-edit')->with([
            'stores' => $stores,
            'product' => $editProduct,
            'discount' => $discount,
        ]);
        }
        else{
            return redirect()->route('landing');
        }  
    }
    
   
    public function news(){
        if (Auth::user() && Auth::user()->role == 1) {
            $posts = Post::get();
        return view('admin.views.news')->with([
            'posts' => $posts,
        ]);
        }
        else{
            return redirect()->route('landing');
        }
        
    }
    public function stores(){
        if (Auth::user() && Auth::user()->role == 1) {
            $stores = Store::get();
        return view('admin.views.stores')->with([
            'stores' => $stores,
        ]);
        }
        else{
            return redirect()->route('landing');
        }
        
    }

    public function orders(){
        if (Auth::user() && Auth::user()->role == 1) {
            $orders = Cart::orderBy('created_at', 'DESC')->get();
            return view('admin.views.orders')->with([
                'carts' => $orders,
            ]);
        }
        else{
            return redirect()->route('landing');
        }
        
    }

   
}
