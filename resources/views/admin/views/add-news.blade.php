@include('admin.layouts.sidebar')

<head>
  <title>Add News</title>
  <meta name="add-news" content="here you can add news posts"/>
</head>
<div class="flex items-center justify-center h-[80%] px-4 pt-6 md:ml-[14%] ">
  <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">Publish News to H5 Community</h3>
    <form method="POST" action="{{ route('store.news') }}" enctype="multipart/form-data" >
      @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="sm:col-span-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Post Title" required>
            </div>
     

              <div class="sm:col-span-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea name="content" id="content" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your post content here..."></textarea>
              </div>
              
             
        </div>
        <div class="pt-4">

          <div >
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
            <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="images[]" multiple>
          </div>

          <button type="submit" class="w-full mt-4 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Publish
          </button>
        </div>
            
    </form>
</div>
</div>
