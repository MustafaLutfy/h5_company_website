<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1){
            return view('welcome');
        }
        else{
            return view('dashboard');
        }
    }
}
