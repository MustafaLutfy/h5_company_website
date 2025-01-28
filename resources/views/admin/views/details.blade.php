<x-app-layout>  
    <div class="py-6">  
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
                <!-- Header -->  
                <div class="p-6 border-b border-gray-200">  
                    <div class="flex justify-between items-center">  
                        <div>  
                            <h2 class="text-2xl font-semibold text-gray-800">  
                                Order Details #{{ $cart->id }}  
                            </h2>  
                            <p class="text-sm text-gray-600">  
                                Created: {{ $cart->created_at->format('M d, Y H:i') }}  
                            </p>  
                        </div>  
                           
                        <div class="flex items-center space-x-4">  
                            <form action="{{ route('cart.update.status', $cart->id) }}"   
                                method="POST"   
                                class="status-form">  
                              @csrf  
                              @method('PATCH')  
                              <select name="status"   
                                      class="status-select text-sm rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  
                                             {{ match($cart->status) {  
                                                 'pending' => 'bg-orange-100 text-yellow-800',  
                                                 'processing' => 'bg-blue-100 text-blue-800',  
                                                 'completed' => 'bg-green-100 text-green-800',  
                                                 'cancelled' => 'bg-red-100 text-red-800',  
                                                 default => 'bg-gray-100 text-gray-800'  
                                             } }}">  
                                  <option value="pending"   
                                          {{ $cart->status === 'pending' ? 'selected' : '' }}  
                                          class="bg-orange-100 text-yellow-800">  
                                      Pending  
                                  </option>  
                                  <option value="processing"   
                                          {{ $cart->status === 'processing' ? 'selected' : '' }}  
                                          class="bg-blue-100 text-blue-800">  
                                      Processing  
                                  </option>  
                                  <option value="completed"   
                                          {{ $cart->status === 'completed' ? 'selected' : '' }}  
                                          class="bg-green-100 text-green-800">  
                                      Completed  
                                  </option>  
                                  <option value="cancelled"   
                                          {{ $cart->status === 'cancelled' ? 'selected' : '' }}  
                                          class="bg-red-100 text-red-800">  
                                      Cancelled  
                                  </option>  
                              </select>  
                          </form> 
                          
                            <a href="{{ route('orders') }}"   
                               class="text-gray-600 hover:text-gray-900">  
                                Back to Orders  
                            </a>  
                        </div>  
                    </div>  
                </div>  

                <!-- Customer Information -->  
                <div class="p-6 border-b border-gray-200">  
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>  
                    <div class="grid grid-cols-2 gap-4">  
                        <div>  
                            <p class="text-sm font-medium text-gray-500">Name</p>  
                            <p class="mt-1">{{ $cart->name }}</p>  
                        </div>  
                        <div>  
                            <p class="text-sm font-medium text-gray-500">Email</p>  
                            <p class="mt-1">{{ $cart->email ?? 'N/A' }}</p>  
                        </div>  
                        <div>  
                            <p class="text-sm font-medium text-gray-500">Phone</p>  
                            <p class="mt-1">{{ $cart->phone }}</p>  
                        </div>  
                        <div>  
                            <p class="text-sm font-medium text-gray-500">Address</p>  
                            <p class="mt-1">{{ $cart->city}}/{{ $cart->address }}</p>  
                        </div>  
                    </div>  
                </div>  

                <!-- Order Items -->  
                <div class="p-6 border-b border-gray-200">  
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Order Items</h3>  
                    <div class="overflow-x-auto">  
                        <table class="min-w-full divide-y divide-gray-200">  
                            <thead class="bg-gray-50">  
                                <tr>  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
                                        Product  
                                    </th>  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
                                        Price  
                                    </th>  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
                                        Quantity  
                                    </th>  
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
                                        Total  
                                    </th>  
                                </tr>  
                            </thead>  
                            <tbody class="bg-white divide-y divide-gray-200">  
                                @foreach($cart->items as $item)  
                                <tr>  
                                    <td class="px-6 py-4 whitespace-nowrap">  
                                        <div class="flex items-center">  
                                            <div class="flex-shrink-0 h-10 w-10">  
                                                <img class="h-10 w-10 rounded-full object-cover"   
                                                     src="{{asset('images/'.App\Models\Image::where('product_id', $item->product->id)->get()->first()->url)}}"
                                                     alt="{{ $item->product->name }}">  
                                            </div>  
                                            <div class="ml-4">  
                                                <div class="text-sm font-medium text-gray-900">  
                                                    {{ $item->product->name }}  
                                                </div>  
                                            </div>  
                                        </div>  
                                    </td>  
                                    <td class="px-6 py-4 whitespace-nowrap">  
                                        <div class="text-sm text-gray-900">  
                                            {{ number_format($item->product->new_price != $item->product->original_price ? $item->product->new_price : $item->product->original_price, 0) }} IQD  
                                        </div>  
                                    </td>  
                                    <td class="px-6 py-4 whitespace-nowrap">  
                                        <div class="text-sm text-gray-900">{{ $item->quantity }}</div>  
                                    </td>  
                                    <td class="px-6 py-4 whitespace-nowrap">  
                                        <div class="text-sm text-gray-900">  
                                            {{ number_format(($item->product->new_price != $item->product->original_price ? $item->product->new_price : $item->product->original_price) * $item->quantity, 0) }} IQD  
                                        </div>  
                                    </td>  
                                </tr>  
                                @endforeach  
                            </tbody>  
                            <tfoot class="bg-gray-50">  
                                <tr>  
                                    <td colspan="3" class="px-6 py-4 text-right text-sm font-medium text-gray-900">  
                                        Total Amount:  
                                    </td>  
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">  
                                        {{ number_format($cart->items->sum(function($item) {  
                                            return ($item->product->new_price != $item->product->original_price ? $item->product->new_price : $item->product->original_price) * $item->quantity;  
                                        }), 0) }} IQD  
                                    </td>  
                                </tr>  
                            </tfoot>  
                        </table>  
                    </div>  
                </div>  

        
            </div>  
        </div>  
    </div>  
    
</x-app-layout>
<script>  
    document.addEventListener('DOMContentLoaded', function() {  
        const statusSelects = document.querySelectorAll('.status-select');  
        
        statusSelects.forEach(select => {  
            // Handle status change  
            select.addEventListener('change', function() {  
                // Get the selected option's classes  
                const selectedOption = this.options[this.selectedIndex];  
                
                // Update the select's background color class  
                this.className = 'status-select text-sm rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ' + selectedOption.className;  
                
                // Submit the form automatically  
                this.closest('form').submit();  
            });  
        });  
    });  
    </script>