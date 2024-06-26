@include('admin.layouts.sidebar')

<head>
  <meta charset="utf-8">
  <title>Buy Now</title>
  <meta name="description" content="this page is full of information about H5 company">
  <link rel="icon" href="{{ url('images/h5-logo.svg') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<div class="flex items-center justify-center h-[80%] px-4 pt-6 md:ml-[14%] ">
  <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
    <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data" >
      @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="sm:col-span-6">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                <input type="text" name="name" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bonnie" required>
            </div>
     
            <div class="sm:col-span-6">
                <label for="original_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="text" name="original_price" id="original_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bonnie" required>
            </div>
     
            <div class="sm:col-span-6">
                <div>
                  <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                  <select id="discount" name="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      <option selected="0">No</option>
                      <option value="0.05">5%</option>
                      <option value="0.10">10%</option>
                      <option value="0.20">20%</option>
                      <option value="0.30">30%</option>
                      <option value="0.40">40%</option>
                      <option value="0.50">50%</option>
                  </select>
              </div>            
            
            </div>
            

              <div class="sm:col-span-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="message" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
              </div>
              
              <div >
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload multiple files</label>
                <input id="multiple_files" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="images[]" multiple>
              </div>

        </div>
        <div class="pt-4">
          <div class="flex">
            <label for="account-activity" class="relative flex items-center cursor-pointer">
              <input type="checkbox" id="account-activity" class="sr-only" >
              <span class="h-6 bg-gray-200 border border-gray-200 rounded-full w-11 toggle-bg dark:bg-gray-700 dark:border-gray-600"></span>
            </label>
            <p class="font-semibold ml-2">Send as gift <span class="line-through">3000IQD</span> <span class="text-green-500">Free</span></p>
          </div>
          
          <button type="submit" class="w-full mt-4 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Add
          </button>
        </div>
            
    </form>
</div>
</div>
