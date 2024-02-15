<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landing(){
        return view('landing');
    }

    public function home(){
        return view('home');
    }

   
}
