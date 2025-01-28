<?php  

namespace App\Http\Controllers;  

use App\Models\Cart;  
use App\Models\Order;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderNotification;  
use Illuminate\Support\Facades\Notification;  

class CheckoutController extends Controller  
{  
    public function index()  
    {  
        $sessionCart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
        return view('checkout')->with(['cart' => $sessionCart]);
    }  

    public function process(Request $request)  
    {  
        try {  
            // Get cart from database using session cart_id  
            $cartId = session()->get('cart_id');  
            $cart = Cart::findOrFail($cartId);  

            // Add your payment processing logic here  
            
            // Update cart status after successful payment  
            $cart->update(['status' => 'completed']);  

            // Clear the session cart after successful checkout  
            session()->forget(['cart', 'cart_id']);  

            return redirect()->route('checkout.success');  

        } catch (\Exception $e) {  
            \Log::error('Checkout Process Error: ' . $e->getMessage());  
            return redirect()->route('checkout.cancel')->with('error', 'Checkout failed: ' . $e->getMessage());  
        }  
    }  


    public function store(Request $request)  
    {  
        // Get cart from session  
        $sessionCart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
        if (empty($sessionCart['items'])) {  
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');  
        }  
    
        try {  
            DB::beginTransaction();  
            // Create a new cart in database  
            $cart = Cart::create([  
                'session_id' => session()->getId(),  
                'user_id' => auth()->id() ?? null,  
                'status' => 'pending',
                'total_amount' => $sessionCart['total_amount'],
                'name' => $request->name,
                'email' => $request->email,
                'city' => $request->city,
                'address' => $request->address,
                'phone' => $request->phone,
                'note' => $request->notes
            ]);  
            
            $total = 0;  
    
            // Transfer items from session to database  
            foreach ($sessionCart['items'] as $productId => $item) {  
                $cartItem = $cart->items()->create([  
                    'product_id' => $item['product_id'],  
                    'quantity' => $item['quantity'],  
                    'price' => $item['price']  
                ]);  
                
                $total += $item['price'] * $item['quantity'];  
            }  
            Notification::route('mail', 'mustafalutfy00@gmail.com')  
            ->notify((new OrderNotification($sessionCart, $cart))  
            ->delay(now()->addSeconds(5))); 
            DB::commit();  
            Notification::route('mail', 'mustafalutfy00@gmail.com')->notify(new OrderNotification($sessionCart, $cart)); 
            return redirect()->route('checkout.success')->with('success', 'Checkout successful.');  

            // Store cart ID in session for reference  
            session()->put('cart_id', $cart->id);  

    
        } catch (\Exception $e) {  
            DB::rollBack();  
            \Log::error('Checkout Error: ' . $e->getMessage());  
            dd($e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Error processing checkout. Please try again.');  
        }  
    }  

    public function success()  
    {  
        // Clear the cart after successful checkout  
        session()->forget('cart');  
        
        return view('success');  
    }  

}