<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
class ProductController extends Controller
{
    public function index(){
        if (Auth::user() && Auth::user()->role == 1) {
            return view('admin.views.add-product');
        }
        else{
            return redirect()->route('landing');
        }
    }

    public function show($id){
        $product = Product::where('id', $id)->get()->first();
        if(Auth::user()){
            $name = Auth::user()->name;
            $phone = Auth::user()->phone;
        }else{
            $name = '';
            $phone = '';
        }
        $images = Image::where('product_id', $id)->get();
        return view('product-details', ['id'=>$id])->with([
            'product' => $product,
            'images' => $images,
            'name' => $name,
            'phone' => $phone,
        ]);
    }
    
    public function create(Request $request){
        
        if (Auth::user() && Auth::user()->role == 1) {
            $discount_price = $request->original_price - $request->original_price * $request->discount;
            if($request->hasFile('images'))
            {
            $files = $request->file('images');
            $product = Product::create([
                'name' => $request->name,
                'original_price' => $request->original_price,
                'new_price' => $discount_price,
                'is_instock' => 1,
                'description' => $request->description,
    
            ]);
            foreach($files as $file){
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                Image::create([
                    'url' => $filename,
                    'product_id' => $product->id,
                ]);
            }
            
        
        }
        else{
            return redirect()->route('landing');
        }
        return redirect()->route('create');
    }
    
}


    public function order(Request $request, $id){

        
        if($request->has('send_gift')){
            $send_gift = 1;
        }else{
            $send_gift = 0;
        }

        $order = Order::create([
            'product_id' => $id,
            'user_name' => $request->name,
            'government' => $request->government,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'send_gift' => $send_gift,

        ]);
            return redirect('/store')->with('message' , 'Order is placed we will be in contact with you soon');
        }
    
    public function deleteOrder($id){

            $order = Order::where('id', $id)->delete();

            return redirect()->route('orders');
        }
    public function deleteProduct($id){

            $product = Product::where('id', $id)->delete();

            return redirect()->route('products');
        }
    
    

}

