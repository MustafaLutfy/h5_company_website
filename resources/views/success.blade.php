<x-app-layout>  
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">  
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
            <div class="p-6 bg-white border-b border-gray-200">  
                <div class="text-center">  
                    <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">  
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>  
                    </svg>  
                    
                    <h2 class="mt-4 text-2xl font-bold text-gray-900">Order Successful!</h2>  
                    <p class="mt-2 text-gray-600">Thank you for your purchase.</p>  
                    
                    <div class="mt-6">  
                        <a href="{{ route('store') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">  
                            Continue Shopping  
                        </a>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</x-app-layout>