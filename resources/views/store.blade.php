<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>H5 Store</title>
    <meta name="description" content="H5 store page for H5 company">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('js/home.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body style="-ms-overflow-style: none;  
scrollbar-width: none;  
overflow-y: scroll;" class="max-w-[50%] text-gray-600 work-sans leading-normal text-base tracking-normal">

  @if(Session::has('message'))
      <div class="flex items-center mx-[20%] mt-4 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-100 border-2 border-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="text-[18px] font-medium">
        <span class="font-medium text-[16px]">Done! </span> {{ Session::get('message') }}.
      </div>
    </div>
  @endif
  

<div id="default-carousel" class="relative " data-carousel="slide" >
  <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        @foreach ($carouselProducts as $carouselProduct)
        <a href="{{route('product', $carouselProduct->id)}}" class="hidden bg-blue-500 duration-700 ease-in-out" data-carousel-item>
          <div class="grid md:grid-cols-3 grid-cols-2 md:mx-24 w-full h-full">
            <div class="flex items-center justify-center">
                <img class="p-8 col-span-1 md:w-[350px]" src="{{asset('images/'.App\Models\Image::where('product_id', $carouselProduct->id)->get()->first()->url)}}" alt="product image" />
            </div>
            <div class="flex flex-col justify-center col-span-1 pb-10">
              <h5 class="md:text-2xl mt-8 font-semibold tracking-tight text-gray-100 dark:text-white">{{$carouselProduct->name}}</h5>
              <div class="flex items-center md:mt-4 md:mb-4">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </div> 
                 <span class=" text-gray-200 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-gray-200 dark:text-gray-800 ms-3">5.0</span>
            </div>
              <div class="mt-2">
                @if (Session::get('locale') == 'ar')
                <span class="md:text-xl text-xs line-through font-semibold text-gray-200 ml-2 dark:text-white">{{__('IQD')}} {{number_format($carouselProduct->original_price, 0)}}</span>
                <span class="md:text-2xl text-md font-bold text-gray-100 dark:text-white">{{__('IQD')}} {{number_format($carouselProduct->new_price, 0)}}</span>
                @else
                <span class="md:text-2xl text-md font-bold text-gray-100 dark:text-white">{{number_format($carouselProduct->new_price, 0)}} IQD</span>
                <span class="md:text-xl text-xs line-through font-semibold text-gray-200 ml-2 dark:text-white">{{number_format($carouselProduct->original_price, 0)}} IQD</span>
                @endif
             </div>
             <div >
             <button type="submit" class="py-3 mt-4 px-8 md:text-xl cursor-pointer font-medium text-center text-gray-800 bg-gray-200
             rounded-lg transition duration-200 hover:bg-blue-200 ease">{{__('Buy Now')}}</button>
            </div>
             
            </div>
            <div class="col-span-1 flex items-center ">
              @if(100 - $carouselProduct->new_price/$carouselProduct->original_price * 100 > 0)
              <h1 class="md:text-9xl text-gray-100 font-bold">{{100 - $carouselProduct->new_price/$carouselProduct->original_price * 100}}%</h1>
              <h1 class="md:text-6xl mb-10  text-gray-100 font-bold">{{__('OFF')}}</h1>
              @else
              <h1 class="md:text-7xl text-gray-100 font-bold">NEW<br>OFFER</h1>
              @endif
            </div>
          </div>
        </a>
        @endforeach
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
  </div>


  <section class="bg-gray-100 py-8 max-w-screen overflow-hidden">

    <div class="md:absolute hidden blur-3xl w-20 h-[1000px] left-[70%] z-0 rounded-full bg-orange-200 rotate-45"></div>
    <div class="md:absolute hidden blur-3xl w-20 h-[640px] left-[30%] z-0 rounded-full bg-purple-200 rotate-45"></div>
    <div class="md:absolute hidden blur-3xl w-20 h-[80px] left-[40%] top-[140%] z-0 rounded-full bg-orange-200 rotate-45"></div>
    <div class="md:absolute hidden blur-3xl w-20 h-[400px] left-[95%] top-[100%] z-0 rounded-full bg-purple-200 rotate-45"></div>
    <div class="md:absolute hidden blur-3xl w-20 h-[400px] left-[0%] top-[100%] z-0 rounded-full bg-orange-200 rotate-45"></div>


      <div class="container mx-auto flex gap-8 justify-center items-center flex-wrap pt-4 pb-12">

          <nav id="store" class="w-full z-30 top-0 px-6 py-1">
              <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                  <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                     {{__('Store')}}
                  </a>

                  <div class="flex items-center" id="store-nav-content">

                      <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                          <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                          </svg>
                      </a>

                      <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                          <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                          </svg>
                      </a>

                  </div>
            </div>
          </nav>

         @foreach ($products as $product)
         <div class="w-full md:max-w-sm mx-8 bg-white z-10 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
          <a href="{{route('product', $product->id)}}">
              <img class="p-8 rounded-t-lg" src="{{asset('images/'.App\Models\Image::where('product_id', $product->id)->get()->first()->url)}}" alt="product image" />
          </a>
          <div class="px-5 pb-5">
              <a href="#">
                  <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
              </a>
              <a href="{{route('store.products', $product->store->id)}}" class="text-blue-700 hover:text-blue-500 font-semibold mt-2.5 mb-5">
                  {{$product->store->name}}
              </a>
              <div class="flex items-center justify-between">
                @if ($product->original_price == $product->new_price) 
                <span class="text-2xl font-bold text-gray-900 dark:text-white">{{number_format($product->original_price, 0)}} {{__('IQD')}}
                </span>
                @else
                @if (Session::get('locale') == 'ar')
                <div>
                  <span class="md:text-2xl font-bold text-gray-900 dark:text-white">{{__('IQD')}} {{number_format($product->new_price, 0)}}</span>
                  <span class="md:text-lg text-md line-through text-gray-400 dark:text-white">{{number_format($product->original_price, 0)}} {{__('IQD')}}</span>  
                </div>  
                @else
                <div>
                  <span class="md:text-2xl font-bold text-gray-900 dark:text-white"> {{number_format($product->new_price, 0)}} {{__('IQD')}}</span>
                  <span class="md:text-lg text-md line-through text-gray-400 dark:text-white">{{number_format($product->original_price, 0)}} {{__('IQD')}}</span>  
                </div>
                @endif
                
                @endif
                  <a class="pl-3 inline-block no-underline hover:text-gray-800" href="#">
                    <svg class="fill-gray-800 hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </a>
              </div>
          </div>
        </div>
         @endforeach
          
        
  </section>

  <section class="bg-white flex w-screen text-center justify-center py-8">

      <div class="py-8 px-6">

          <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
    {{__('ABOUT STORE')}}
    <p class="mt-4 font-light">{{__('This is the Store branch of H5 Company one of our branches to sell every thing you would imagine')}}</p>

      </div>
  </section>

<footer class=" bg-white py-8 border-t border-gray-400">
<div class="flex px-3 py-8 ">
  <div class="w-full mx-auto flex flex-wrap">
    <div class="flex w-full ">

    </div>
    <div class="flex w-screen justify-center text-center mt-6 md:mt-0">
      <div class="px-3 md:px-0">
        <h3 class=" font-bold text-gray-900">{{__('Social')}}</h3>

        <div class="w-full flex items-center py-4 mt-0">
          <a href="https://www.instagram.com/h5store.iq?igsh=Y2M4Nnp5Y29vbjMx" target="_blank" class="mx-2">
            <svg class="w-6 h-6 fill-gray-600 hover:fill-gray-700" viewBox="0 0 24 24">
              <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path>
            </svg>
          </a>
          <a href="https://www.tiktok.com/@h5store.iq?_t=8k7o3N3fSv0&_r=1" target="_blank" class="mx-2">
            <svg class="w-6 h-6 fill-gray-600 hover:fill-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g ><path d="M22.459 6.846v3.659c-.197 0-.433.04-.669.04a7.295 7.295 0 0 1-4.682-1.732v7.79a6.987 6.987 0 0 1-1.416 4.25a7.02 7.02 0 0 1-5.626 2.832a6.993 6.993 0 0 1-5.941-3.305c1.259 1.18 2.95 1.928 4.8 1.928a6.893 6.893 0 0 0 5.586-2.833c.866-1.18 1.417-2.636 1.417-4.249v-7.83c1.259 1.102 2.872 1.732 4.682 1.732c.236 0 .433 0 .669-.04v-2.36c.354.079.669.118 1.023.118z"/><path d="M11.05 9.56v4.053a3.277 3.277 0 0 0-.866-.118c-1.732 0-3.148 1.456-3.148 3.226c0 .394.079.748.197 1.102c-.787-.59-1.338-1.535-1.338-2.597c0-1.77 1.416-3.226 3.148-3.226c.314 0 .59.04.865.118V9.521h.236c.315 0 .63 0 .905.04zm6.648-5.626c-.708-.63-1.22-1.495-1.495-2.4h.945v.551a6.25 6.25 0 0 0 .55 1.85z"/><path d="M21.318 6.767v2.36c-.197.04-.433.04-.669.04a7.295 7.295 0 0 1-4.682-1.73v7.79a6.987 6.987 0 0 1-1.416 4.248c-1.299 1.732-3.305 2.833-5.587 2.833c-1.85 0-3.541-.747-4.8-1.928a7.136 7.136 0 0 1-1.062-3.737c0-3.817 3.03-6.925 6.806-7.043v2.597a3.277 3.277 0 0 0-.865-.118c-1.732 0-3.148 1.455-3.148 3.226c0 1.062.512 2.046 1.338 2.597c.433 1.22 1.613 2.124 2.95 2.124c1.732 0 3.148-1.456 3.148-3.226V1.534h2.872c.276.945.787 1.77 1.495 2.4a5.397 5.397 0 0 0 3.62 2.833"/><path d="M9.908 8.184V9.52c-3.777.118-6.806 3.226-6.806 7.043c0 1.377.393 2.636 1.062 3.738A7.122 7.122 0 0 1 2 15.148c0-3.896 3.148-7.043 7.003-7.043c.315 0 .63.04.905.079"/><path d="M16.203 1.534h-2.872v15.187c0 1.77-1.416 3.227-3.147 3.227c-1.377 0-2.518-.866-2.951-2.125c.511.354 1.14.59 1.81.59c1.73 0 3.147-1.416 3.147-3.187V0h3.817v.079c0 .157 0 .314.039.472c0 .315.079.669.157.983m5.115 3.777v1.417c-1.574-.315-2.911-1.377-3.659-2.794a5.11 5.11 0 0 0 3.659 1.377"/></g></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</footer>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<div class="w-fill text-center p-4 bg-gray-200 font-bold">
  لا نتعامل بالدين
</div>
</body>

</x-app-layout>