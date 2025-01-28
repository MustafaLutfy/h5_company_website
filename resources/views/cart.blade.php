<x-app-layout>  
    <div class="py-6">  
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
                <div class="p-6">  
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Shopping Cart</h2>  

                    @if(isset($cart['items']) && count($cart['items']) > 0)
                        <div class="space-y-6">  
                            <!-- Cart Items -->  
                            @foreach($cart['items'] as $productId => $item)  
                                <div class="flex items-center justify-between border-b border-gray-200 pb-6"   
                                     id="cart-item-{{ $productId }}">  
                                    <div class="flex items-center space-x-4">  
                                        @if(isset(App\Models\Image::where('product_id', $item['product_id'])->first()->url))  
                                        <img src="{{ asset('images/' . App\Models\Image::where('product_id', $item['product_id'])->first()->url) }}"  
                                                 alt="{{ $item['name'] }}"  
                                                 class="w-24 h-24 object-cover rounded">  
                                        @else  
                                            <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center">  
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />  
                                                </svg>  
                                            </div>  
                                        @endif  
                                        <div>  
                                            <h3 class="text-lg font-medium text-gray-900">{{ $item['name'] }}</h3>  
                                            <p class="text-gray-600">{{ number_format($item['price'], 0) }} IQD</p>  
                                        </div>  
                                    </div>  

                                    <div class="flex items-center space-x-4">  
                                        <div class="flex items-center border rounded-lg">  
                                            <button type="button"  
                                                    class="px-3 py-1 hover:bg-gray-100 quantity-btn"   
                                                    data-action="decrease"   
                                                    data-product-id="{{ $item['product_id'] }}">  
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />  
                                                </svg>  
                                            </button>  
                                            <input type="number"   
                                                   min="1"  
                                                   value="{{ $item['quantity'] }}"   
                                                   class="w-16 text-center border-x py-1 quantity-input"  
                                                   data-product-id="{{ $item['product_id'] }}">  
                                            <button type="button"  
                                                    class="px-3 py-1 hover:bg-gray-100 quantity-btn"   
                                                    data-action="increase"   
                                                    data-product-id="{{ $item['product_id'] }}">  
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />  
                                                </svg>  
                                            </button>  
                                        </div>  
                                    
                                        <button type="button"  
                                                class="text-red-600 hover:text-red-800 remove-item"   
                                                data-product-id="{{ $item['product_id'] }}">  
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"   
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />  
                                            </svg>  
                                        </button>  
                                    </div>  
                                </div>  
                            @endforeach  

                            <!-- Cart Summary -->  
                            <div class="mt-8 bg-gray-50 rounded-lg p-6">  
                                <!-- Summary Header -->  
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Cart Summary</h3>  
                                
                                <!-- Price Breakdown -->  
                                <div class="space-y-3">  
                                    <div class="flex justify-between text-sm">  
                                        <span class="text-gray-600">Subtotal</span>  
                                        <span class="font-medium text-gray-900" id="cart-total">  
                                            {{ number_format($cart['total_amount'], 0) }} IQD  
                                        </span>  
                                    </div>  
                                    
                                    <div class="flex justify-between text-sm">  
                                        <span class="text-gray-600">Shipping</span>  
                                        <span class="text-gray-900">Free</span>  
                                    </div>  
                                    
                                    <div class="border-t border-gray-200 my-4"></div>  
                                    
                                    <!-- Total -->  
                                    <div class="flex justify-between text-base">  
                                        <span class="font-semibold text-gray-900">Estimated Total</span>  
                                        <span class="font-bold text-gray-900">  
                                            {{ number_format($cart['total_amount'], 0) }} IQD  
                                        </span>  
                                    </div>  
                                </div>  
                                
                                <!-- Action Buttons -->  
                                <div class="mt-6 space-y-4">  
                                    <a href="{{ route('checkout') }}"   
                                       class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out">  
                                        Proceed to Checkout  
                                    </a>  
                                    
                                    <a href="{{ route('store') }}"   
                                       class="w-full flex items-center justify-center px-6 py-3 border border-gray-300 rounded-md shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 transition duration-150 ease-in-out">  
                                        Continue Shopping  
                                    </a>  
                                </div>  
                                                        
                            </div>  
                        </div>  
                    @else  
                        <div class="text-center py-12">  
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"   
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />  
                            </svg>  
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Your cart is empty</h3>  
                            <p class="mt-1 text-sm text-gray-500">Start adding some items to your cart!</p>  
                            <div class="mt-6">  
                                <a href="{{ route('store') }}"   
                                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">  
                                    Browse Products  
                                </a>  
                            </div>  
                        </div>  
                    @endif  
                </div>  
            </div>  
        </div>  
    </div>  
</x-app-layout>


<script>  
    document.addEventListener('DOMContentLoaded', function() {  
        // Handle quantity buttons  
        document.querySelectorAll('.quantity-btn').forEach(button => {  
            button.addEventListener('click', function() {  
                const productId = this.dataset.productId;  
                const action = this.dataset.action;  
                const input = document.querySelector(`.quantity-input[data-product-id="${productId}"]`);  
                let quantity = parseInt(input.value);  
    
                if (action === 'increase') {  
                    quantity++;  
                } else if (action === 'decrease' && quantity > 1) {  
                    quantity--;  
                }  
    
                updateCartQuantity(productId, quantity);  
            });  
        });  
    
        // Handle quantity input changes  
        document.querySelectorAll('.quantity-input').forEach(input => {  
            input.addEventListener('change', function() {  
                const productId = this.dataset.productId;  
                const quantity = parseInt(this.value);  
                if (quantity >= 1) {  
                    updateCartQuantity(productId, quantity);  
                } else {  
                    this.value = 1;  
                    updateCartQuantity(productId, 1);  
                }  
            });  
        });  
    
        // Handle remove buttons  
        document.querySelectorAll('.remove-item').forEach(button => {  
            button.addEventListener('click', function() {  
                const productId = this.dataset.productId;  
                removeCartItem(productId);  
            });  
        });  
    
        // Function to update cart quantity  
        function updateCartQuantity(productId, quantity) {  
            fetch(`/cart/${productId}/update`, {  
                method: 'POST',  
                headers: {  
                    'Content-Type': 'application/json',  
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',  
                    'Accept': 'application/json'  
                },  
                body: JSON.stringify({ quantity: quantity })  
            })  
            .then(response => response.json())  
            .then(data => {  
                if (data.success) {  
                    location.reload(); // Reload to update totals  
                } else {  
                    alert('Error updating cart');  
                }  
            })  
            .catch(error => {  
                console.error('Error:', error);  
                alert('Error updating cart');  
            });  
        }  
    
        // Function to remove cart item  
        function removeCartItem(productId) {  
            if (confirm('Are you sure you want to remove this item?')) {  
                fetch(`/cart/${productId}/remove`, {  
                    method: 'DELETE',  
                    headers: {  
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',  
                        'Accept': 'application/json'  
                    }  
                })  
                .then(response => response.json())  
                .then(data => {  
                    if (data.success) {  
                        location.reload(); // Reload to update cart  
                    } else {  
                        alert('Error removing item');  
                    }  
                })  
                .catch(error => {  
                    console.error('Error:', error);  
                    alert('Error removing item');  
                });  
            }  
        }  
    });  
    </script>  