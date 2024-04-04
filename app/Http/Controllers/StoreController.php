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
       Store::create([
        'name' => $request->name,
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
        //
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
