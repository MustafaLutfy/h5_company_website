@include('admin.layouts.sidebar')
<head>
  <title>Add Product</title>
  <meta name="add-products" content="here you can add new products"/>
  <link rel="icon" href="{{ url('images/h5-logo.svg') }}">
</head>

<div class="flex items-center justify-center h-[80%] px-4 mt-20 pt-6 md:ml-[14%] ">
  <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
    <form method="POST" action="{{ route('product.edit', $product->id) }}" enctype="multipart/form-data" >
      @method("PUT")  
      @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="sm:col-span-6">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                <input type="text" name="name" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ="Ex:placeholder Gaming Mouse" value="{{$product->name}}" required>
            </div>
     
            <div class="sm:col-span-6">
                <label for="original_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="text" name="original_price" id="original_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="40000" value="{{$product->original_price}}" required>
            </div>
     
            <div class="sm:col-span-6">
                <label for="product_order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Order</label>
                <input type="text" name="product_order" id="product_order" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="01" value="{{$product->product_order}}" required>
            </div>
    
            <div class="sm:col-span-6">
                <div>
                  <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                  <select id="discount" name="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="0.0" {{ $discount  == 0.0 ? 'selected' : '' }}>No Discount</option>
                        <option value="0.05" {{ $discount  == 0.05 ? 'selected' : '' }}>5%</option>
                        <option value="0.1" {{ $discount  == 0.1 ? 'selected' : '' }}>10%</option>
                        <option value="0.2" {{ $discount  == 0.2 ? 'selected' : '' }}>20%</option>
                        <option value="0.3" {{ $discount  == 0.3 ? 'selected' : '' }}>30%</option>
                        <option value="0.4" {{ $discount  == 0.4 ? 'selected' : '' }}>40%</option>
                        <option value="0.5" {{ $discount  == 0.5 ? 'selected' : '' }}>50%</option>
                        <option value="0.6" {{ $discount  == 0.6 ? 'selected' : '' }}>60%</option>
                        <option value="0.7" {{ $discount  == 0.7 ? 'selected' : '' }}>70%</option>
                        <option value="0.8" {{ $discount  == 0.8 ? 'selected' : '' }}>80%</option>
                        <option value="0.9" {{ $discount  == 0.9 ? 'selected' : '' }}>90%</option>

                  </select>
              </div>            
            
            </div>
            

              <div class="sm:col-span-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">English Description</label>
                <textarea name="description" id="message" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your product info...">{{$product->description}}</textarea>
              </div>
              

              <div class="sm:col-span-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arabic Description</label>
                <textarea name="description_ar" id="message" rows="4" class="block max-h-56 p-2.5 w-full text-right  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="أدخِل معلومات المنتج">{{$product->description_ar}}</textarea>
              </div>
              
              <div class="flex gap-10">
                <div class="w-[60%] ">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Product</label>
                  <input id="multiple_files" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="images[]" multiple>
                </div>
                <div class="w-[50%]">
                  <label for="store" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose Store</label>
                  <select id="store" name="store_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      @foreach ($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                      @endforeach
                  </select>
              </div>    
              </div>
           

        </div>
        <div class="pt-4">

          
          <button type="submit" class="w-full mt-4 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Update
          </button>
        </div>
            
    </form>
</div>
</div>
