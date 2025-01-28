<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
 

    public function store(Request $request)
    {
        $file = $request->file('images');
        $filename = time() . $file[0]->getClientOriginalName();
        $file[0]->move(public_path('store_images'), $filename);
       Store::create([
        'name' => $request->name,
        'image' => $filename,   
       ]);
       return redirect()->route('stores');
    }

    
    public function show($id)
    {
        $store = Store::find($id);
        return view('store-products')->with([
            'store' => $store,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)  
    {  
        $request->validate([  
            'name' => 'required|string|max:255',  
            'images' => 'nullable|array',  
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'  
        ]);  
    
        $data = [  
            'name' => $request->name  
        ];  
    
        if ($request->hasFile('images')) {  
            $file = $request->file('images');  
            $filename = time() . $file[0]->getClientOriginalName();  
            $file[0]->move(public_path('store_images'), $filename);  
            
            // Delete old image if exists  
            if ($store->image && file_exists(public_path('store_images/' . $store->image))) {  
                unlink(public_path('store_images/' . $store->image));  
            }  
            
            $data['image'] = $filename;  
        }  
    
        $store->update($data);  
    
        return redirect()->route('stores')->with('success', 'Store updated successfully');  
    }  
    /**
     * Remove the specified resource from storage.
     */
    public function deleteStore($id)
    {
        $store = Store::where('id', $id)->delete();

        return redirect()->route('stores');
    }
}
