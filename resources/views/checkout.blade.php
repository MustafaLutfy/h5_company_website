<x-app-layout>  
    <div class="py-6">  
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">  
                <!-- Checkout Form -->  
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
                    <div class="p-6">  
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Shipping Information</h2>  
                        
                        <form action="{{ route('checkout.store') }}" method="POST">  
                            @csrf  
                            
                            <!-- Name -->  
                            <div class="mb-4">  
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>  
                                <input type="text"  
                                       name="name"  
                                       id="name"  
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"  
                                       value="{{ auth()->check() ? auth()->user()->name : old('name') }}"  
                                       required>  
                                @error('name')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <!-- Email -->  
                            <div class="mb-4">  
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>  
                                <input type="email"  
                                       name="email"  
                                       id="email"  
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"  
                                       value="{{ auth()->check() ? auth()->user()->email : old('email') }}"  
                                       {{ auth()->check() ? 'readonly' : '' }}  
                                       required>  
                                @error('email')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <!-- Phone -->  
                            <div class="mb-4">  
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>  
                                <input type="tel"  
                                       name="phone"  
                                       id="phone"  
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"  
                                       value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}"  
                                       required>  
                                @error('phone')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <!-- City -->  
                            <div class="mb-4">  
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>  
                                <select name="city"  
                                        id="city"  
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"  
                                        required>  
                                    <option value="">Select a city</option>  
                                    <option value="Baghdad" {{ (auth()->check() && auth()->user()->city === 'Baghdad') || old('city') === 'Baghdad' ? 'selected' : '' }}>Baghdad</option>  
                                    <option value="Basra" {{ (auth()->check() && auth()->user()->city === 'Basra') || old('city') === 'Basra' ? 'selected' : '' }}>Basra</option>  
                                    <option value="Mosul" {{ (auth()->check() && auth()->user()->city === 'Mosul') || old('city') === 'Mosul' ? 'selected' : '' }}>Mosul</option>  
                                </select>  
                                @error('city')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <!-- Address -->  
                            <div class="mb-4">  
                                <label for="address" class="block text-sm font-medium text-gray-700">Detailed Address</label>  
                                <textarea name="address"  
                                          id="address"  
                                          rows="3"  
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"  
                                          required>{{ auth()->check() ? auth()->user()->address : old('address') }}</textarea>  
                                @error('address')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <!-- Notes -->  
                            <div class="mb-6">  
                                <label for="notes" class="block text-sm font-medium text-gray-700">Order Notes (Optional)</label>  
                                <textarea name="notes"  
                                          id="notes"  
                                          rows="3"  
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes') }}</textarea>  
                                @error('notes')  
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>  
                                @enderror  
                            </div>  

                            <div class="flex items-center justify-between">  
                                <a href="{{ route('cart.index') }}"  
                                   class="text-indigo-600 hover:text-indigo-900">  
                                    ← Back to Cart  
                                </a>  
                                <button type="submit"  
                                        class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">  
                                    Place Order  
                                </button>  
                            </div>  
                        </form>  
                    </div>  
                </div>  

                <!-- Order Summary -->  
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
                    <div class="p-6">  
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Summary</h2>  
                        
                        <div class="space-y-4">  
                            @php  
                                $sessionCart = session()->get('cart', ['items' => [], 'total_amount' => 0]);  
                                $total = $sessionCart['total_amount'];  
                            @endphp  
                
                            @foreach($sessionCart['items'] as $productId => $item)  
                                @php  
                                    $product = App\Models\Product::find($item['product_id']);  
                                    $price = $item['price'];  
                                    $subtotal = $price * $item['quantity'];  
                                @endphp  
                                <div class="flex items-center space-x-4">  
                                    <img src="{{ asset('images/' . App\Models\Image::where('product_id', $item['product_id'])->first()->url) }}"  
                                         alt="{{ $item['name'] }}"  
                                         class="w-16 h-16 object-cover rounded">  
                                    <div class="flex-1">  
                                        <h3 class="text-sm font-medium text-gray-900">{{ $item['name'] }}</h3>  
                                        <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>  
                                    </div>  
                                    <div class="text-sm font-medium text-gray-900">  
                                        {{ number_format($price, 0) }} IQD  
                                    </div>  
                                </div>  
                            @endforeach  
                
                            <div class="border-t border-gray-200 pt-4 mt-4">  
                                <div class="flex justify-between text-base font-medium text-gray-900">  
                                    <p>Subtotal</p>  
                                    <p>{{ number_format($total, 0) }} IQD</p>  
                                </div>  
                                <div class="flex justify-between text-sm text-gray-500 mt-1">  
                                    <p>Shipping</p>  
                                    <p>Free</p>  
                                </div>  
                                <div class="flex justify-between text-base font-medium text-gray-900 mt-4">  
                                    <p>Total</p>  
                                    <p>{{ number_format($total, 0) }} IQD</p>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>
            </div>  
        </div>  
    </div>  
</x-app-layout>