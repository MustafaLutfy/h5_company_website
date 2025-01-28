<?php  

namespace App\Http\Controllers;  

use App\Http\Controllers\Controller;  
use App\Models\Product;  
use App\Models\Cart;  
use Illuminate\Http\Request;  

class CartController extends Controller  
{  
    private function getCart()  
    {  
        if (!session()->has('cart')) {  
            session()->put('cart', [  
                'items' => [],  
                'total_amount' => 0  
            ]);  
        }  
        return session()->get('cart');  
    }  

    private function saveCart($cart)  
    {  
        session()->put('cart', $cart);  
    }  

    private function calculateTotal($items)  
    {  
        if (empty($items)) {  
            return 0;  
        }  
        
        return array_reduce($items, function($total, $item) {  
            return $total + ($item['price'] * $item['quantity']);  
        }, 0);  
    }  

    public function index()  
    {  
        $sessionCart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
        $cartItems = [];  
        $total = 0;  
    
        foreach ($sessionCart['items'] as $productId => $item) {  
            $cartItems[] = [  
                'product_id' => $item['product_id'],  
                'name' => $item['name'],  
                'quantity' => $item['quantity'],  
                'price' => $item['price'],  
                'image' => $item['image'],  
                'subtotal' => $item['price'] * $item['quantity']  
            ];  
            $total += $item['price'] * $item['quantity'];  
        }  
    
        return view('cart', [  
            'cart' => [  
                'items' => $cartItems,  
                'total_amount' => $total  
            ]  
        ]);  
    }  
    
    private function getCartCount()  
    {  
        $cart = session()->get('cart');  
        return isset($cart['items']) ? array_sum(array_column($cart['items'], 'quantity')) : 0;  
    }  

    public function add(Request $request)  
    {  
        $validated = $request->validate([  
            'product_id' => 'required|exists:products,id',  
            'quantity' => 'required|integer|min:1'  
        ]);  
    
        $product = Product::findOrFail($validated['product_id']);  
        
        $cart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
        
        if (isset($cart['items'][$product->id])) {  
            $cart['items'][$product->id]['quantity'] += $validated['quantity'];  
        } else {  
            $cart['items'][$product->id] = [  
                'product_id' => $product->id,  
                'name' => $product->name,  
                'quantity' => $validated['quantity'],  
                'price' => $product->new_price != $product->original_price ? $product->new_price : $product->original_price,  
                'image' => $product->image  
            ];  
        }  
        
        // Recalculate total  
        $cart['total_amount'] = collect($cart['items'])->sum(function($item) {  
            return $item['price'] * $item['quantity'];  
        });  
        
        session()->put('cart', $cart);  
        
        return response()->json([  
            'success' => true,  
            'message' => 'Product added to cart successfully!',  
            'cart_count' => $this->getCartCount()  
        ]);  
    }  

    public function updateQuantity(Request $request, $productId)  
{  
    $request->validate([  
        'quantity' => 'required|integer|min:1'  
    ]);  

    $cart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
    
    if (isset($cart['items'][$productId])) {  
        $cart['items'][$productId]['quantity'] = $request->quantity;  
        
        // Recalculate total  
        $cart['total_amount'] = 0;  
        foreach ($cart['items'] as $item) {  
            $cart['total_amount'] += $item['price'] * $item['quantity'];  
        }  
        
        session()->put('cart', $cart);  
        
        return response()->json([  
            'success' => true,  
            'message' => 'Cart updated successfully'  
        ]);  
    }  
    
    return response()->json([  
        'success' => false,  
        'message' => 'Product not found in cart'  
    ], 404);  
}  

public function remove($productId)  
{  
    $cart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
    
    if (isset($cart['items'][$productId])) {  
        unset($cart['items'][$productId]);  
        
        // Recalculate total  
        $cart['total_amount'] = 0;  
        foreach ($cart['items'] as $item) {  
            $cart['total_amount'] += $item['price'] * $item['quantity'];  
        }  
        
        session()->put('cart', $cart);  
        
        return response()->json([  
            'success' => true,  
            'message' => 'Item removed successfully'  
        ]);  
    }  
    
    return response()->json([  
        'success' => false,  
        'message' => 'Product not found in cart'  
    ], 404);  
}  

    public function addToCart(Request $request)  
    {  
        $request->validate([  
            'product_id' => 'required|exists:products,id',  
            'quantity' => 'required|integer|min:1'  
        ]);  

        $product = Product::findOrFail($request->product_id);  
        $cart = $this->getCart();  

        if (!isset($cart['items'])) {  
            $cart['items'] = [];  
        }  

        $price = $product->new_price ?: $product->original_price;  

        if (isset($cart['items'][$product->id])) {  
            $cart['items'][$product->id]['quantity'] += $request->quantity;  
        } else {  
            $cart['items'][$product->id] = [  
                'product_id' => $product->id,  
                'name' => $product->name,  
                'price' => $price,  
                'quantity' => $request->quantity,  
                'image' => $product->image  
            ];  
        }  

        $cart['total_amount'] = $this->calculateTotal($cart['items']);  
        $this->saveCart($cart);  

        return response()->json([  
            'success' => true,  
            'message' => 'Product added to cart successfully!',  
            'cart_count' => $this->getCartCount(),  
            'total_amount' => number_format($cart['total_amount'], 0) . ' IQD'  
        ]);  
    }  


    public function clear()  
    {  
        session()->put('cart', [  
            'items' => [],  
            'total_amount' => 0  
        ]);  
        
        return response()->json([  
            'success' => true,  
            'message' => 'Cart cleared successfully!',  
            'cart_count' => 0,  
            'total_amount' => '0 IQD'  
        ]);  
    }  

    // Admin methods for handling orders  
    public function details($orderId)  
    {  
        $cart = Cart::with(['items.product'])
            ->where('status', '!=', 'cart')  
            ->findOrFail($orderId);  
        return view('admin.views.details', compact('cart'));  
    }  

    public function updateStatus(Request $request, $orderId)  
    {  
        $request->validate([  
            'status' => 'required|in:pending,processing,completed,cancelled'  
        ]);  

        $order = Cart::findOrFail($orderId);  
        $order->update(['status' => $request->status]);  

        return redirect()->back()->with('success', 'Order status updated successfully');  
    }  

    public function delete($orderId)  
    {  
        $order = Cart::findOrFail($orderId);  
        $order->items()->delete();  
        $order->delete();  

        return redirect()->back()->with('success', 'Order deleted successfully');  
    }  
}