<?php

namespace App\Http\Controllers;
use App\Charts\WeaklySalesChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;

use Auth;
use DB;
class AdminController extends Controller
{
    public function index(WeaklySalesChart $chart)
    {
        $products = Product::get();
        $images = Image::get();
        $users = User::get();
        if (Auth::user() && Auth::user()->role == 1) {
            return view('admin.views.dashboard', [
                'chart' => $chart->build(),
                'products' => $products,
                'images' => $images,
                'users' => $users,
            ]);
        }
        else{
            return redirect()->route('landing');
        }
    }
}
