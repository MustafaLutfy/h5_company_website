<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>H5 Home</title>
  <meta name="description" content="H5 company home page">
  <meta name="author" content="Mustafa Lutfy" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{asset('particleJs/particles.css')}}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu-ul.css')}}">
  <link rel="icon" href="{{ url('images/h5-logo.svg') }}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: "Rubik", sans-serif;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
    }
  </style>
</head>


{{-- <!-- count particles -->
<div class="count-particles">
  <span class="js-count-particles">--</span> particles
</div> --}}

<!-- particles.js container -->
<div id="particles-js"></div>



<!-- scripts -->
<script src="{{asset('particleJs/particles.js')}}"></script>
<script src="{{asset('particleJs/js/app.js')}}"></script>

<!-- stats.js -->
{{-- <script src="{{asset('particleJs/js/lib/stats.js')}}"></script> --}}
<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>



<div class="w-[80%] h-screen bg-[#111111] opacity-[0.9] absolute m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
  <div class="flex h-[50%] mt-20 pl-12 items-center">
    <div class="md:px-40 mt-20">
      <h1 class="text-lg text-orange-400">H5 COMPANY</h1>
      <h3 class="text-4xl leading-[50px] text-gray-100 mt-3 tracking-widest">MAKE YOUR <br> <span class="text-orange-400 text-5xl tracking-widest">DREAMS</span><br>COME TO <span class="tracking-[25px]">LIFE</span></h3>  
    </div>
    <img class="w-[30%] md:block hidden ml-[10%] mt-16 rounded-lg p-10" src="{{asset('images/undraw_absorbed_in_re_ymd6.svg')}}" alt="">
  </div>
  
  <div class="flex flex-col items-center gap-4 h-[50%] mt-4">

    <div class="w-[80%]">
      <h2 class="text-orange-400 text-2xl {{ Session::get('locale') == 'ar' ? 'text-right' : ''}} border-b-2 border-orange-400 my-8"> {{__('Our Branches')}}</h2>
    </div>
    <div class="flex md:flex-row flex-col py-12 gap-8">
      <div>
        <a href="{{route('store')}}" class="flex items-center justify-center text-center w-40 h-40 rounded-full border-4 border-orange-400 cursor-pointer transition hover:bg-[#212121]">
            @if (Session::get('locale') == 'ar')
              <h1 class="text-2xl text-gray-100">{{__('STORE')}}<br><span class="text-2xl text-orange-400 font-semibold">H5</span></h1>
 
            @else
               <h1 class="text-2xl text-gray-100"><span class="text-2xl text-orange-400 font-semibold">H5 <br></span>STORE</h1>
            @endif
        </a>
      </div>
      <a>
        <div class="flex items-center justify-center text-center w-40 h-40 rounded-full border-4 border-blue-400">
            <h1 class="text-2xl text-gray-100"><span class="text-2xl text-blue-400 font-semibold">{{__('SOON')}}<br></span></h1>
        </div>
      </a>
      <a>
        <div class="flex items-center justify-center  text-center w-40 h-40 rounded-full border-4 border-green-400">
            <h1 class="text-2xl text-gray-100"><span class="text-2xl text-green-400 font-semibold">{{__('SOON')}}<br></span></h1>
        </div>
      </div>
    </a>

    <div class="w-[80%] mt-20 mb-20">
      <div class="">
        <h2 class="text-orange-400 text-2xl {{ Session::get('locale') == 'ar' ? 'text-right' : ''}} border-b-2 border-orange-400 my-8 ">{{ __('Who We Are ?') }}</h2>
      </div>
      <p class="text-lg w-full text-gray-100 {{ Session::get('locale') == 'ar' ? 'text-right' : ''}}">
        {{__('We are a company that cares about human resources.  We try to collect everything in one place.  In addition to the many opportunities.  The goal is to find a place that brings together freelancers , To make thier way easier than before.')}}
      </p>
    </div>

  
    
    <div class="w-[80%] mb-40 bg-[#111111] opacity-[0.9]">
      

      <div class="">
        <h2 class="text-orange-400 text-2xl {{ Session::get('locale') == 'ar' ? 'text-right' : ''}} border-b-2 border-orange-400 my-8 ">{{__('OUR TEAM')}}</h2>
      </div>
      <div class="flex gap-12 md:flex-row md:items-start {{ Session::get('locale') == 'ar' ? 'justify-end text-right' : ''}} items-center flex-col">
        <div class="">
          <div class="h-44 w-44 flex  items-center">
            <img class="rounded-lg" src="{{asset('images/Project (20240222112903).jpg')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">{{__('Hussain')}}</h1>
          <h2 class="text-lg text-orange-400">{{__('CEO')}}</h2>
        </div>
        <div>
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-25 011943.png')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">{{__('T A I F')}}</h1>
          <h2 class="text-lg text-orange-400">{{__('Graphic Designer')}}</h2>
        </div>
        <div>
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-23 020232.png')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">{{__('Mustafa')}}</h1>
          <h2 class="text-lg text-orange-400">{{__('Website Developer')}}</h2>
        </div>
        <div>
          <div class="h-44 w-44 bg-black rounded-lg flex items-center">
            <img class="rounded-lg" src="{{asset('images/photo_2024-03-20_02-39-03.jpg')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">{{__('ALEENA')}}</h1>
          <h2 class="text-lg text-orange-400">{{__('Voice Over')}}</h2>
        </div>
      </div>

    </div>
    <div class="flex flex-col gap-4 h-[100%] w-full mt-20 justify-center items-center">
      <div class="w-[80%]">
        <h2 class="text-orange-400 text-2xl {{ Session::get('locale') == 'ar' ? 'text-right' : ''}} border-b-2 border-orange-400 my-8">{{__('Latest Updates')}}</h2>
      </div>
      @foreach ($posts as $post)
      <div class="grid grid-cols-6 w-[80%] h-40 bg-[#212121] rounded-lg py-4">
        <div class="col-span-1 flex items-center justify-center h-full">
          <img class="w-[60%]  rounded-full" src="{{asset('news_images/'.$post->image)}}" alt="">
        </div>
        <div class="text-gray-100 col-span-5 px-4 ">
          <h2 class="text-xl font-semibold text-orange-400">{{$post->title}}</h2>
          <p class="w-full mt-2 text-lg overflow-hidden">{{$post->content}}.</p>
        </div>
     </div>
      @endforeach
        
    </div>

    <div class="flex flex-col gap-4 h-[100%] w-full mt-20 justify-center items-center">
      <div class="w-screen bg-[#212121] h-36">
        <div class="w-full flex justify-center items-center py-4 mt-10">
          <a href="https://www.instagram.com/h5_company?igsh=Ym1ycHFqNHV6OHI2" target="_blank" class="mx-2">
            <svg class="w-6 h-6 fill-gray-100 hover:fill-gray-200" viewBox="0 0 24 24">
              <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path>
            </svg>
          </a>
          {{-- <a href="https://www.tiktok.com/@h5store.iq?_t=8k7o3N3fSv0&_r=1" target="_blank" class="mx-2">
            <svg class="w-6 h-6 fill-gray-100 hover:fill-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g ><path d="M22.459 6.846v3.659c-.197 0-.433.04-.669.04a7.295 7.295 0 0 1-4.682-1.732v7.79a6.987 6.987 0 0 1-1.416 4.25a7.02 7.02 0 0 1-5.626 2.832a6.993 6.993 0 0 1-5.941-3.305c1.259 1.18 2.95 1.928 4.8 1.928a6.893 6.893 0 0 0 5.586-2.833c.866-1.18 1.417-2.636 1.417-4.249v-7.83c1.259 1.102 2.872 1.732 4.682 1.732c.236 0 .433 0 .669-.04v-2.36c.354.079.669.118 1.023.118z"/><path d="M11.05 9.56v4.053a3.277 3.277 0 0 0-.866-.118c-1.732 0-3.148 1.456-3.148 3.226c0 .394.079.748.197 1.102c-.787-.59-1.338-1.535-1.338-2.597c0-1.77 1.416-3.226 3.148-3.226c.314 0 .59.04.865.118V9.521h.236c.315 0 .63 0 .905.04zm6.648-5.626c-.708-.63-1.22-1.495-1.495-2.4h.945v.551a6.25 6.25 0 0 0 .55 1.85z"/><path d="M21.318 6.767v2.36c-.197.04-.433.04-.669.04a7.295 7.295 0 0 1-4.682-1.73v7.79a6.987 6.987 0 0 1-1.416 4.248c-1.299 1.732-3.305 2.833-5.587 2.833c-1.85 0-3.541-.747-4.8-1.928a7.136 7.136 0 0 1-1.062-3.737c0-3.817 3.03-6.925 6.806-7.043v2.597a3.277 3.277 0 0 0-.865-.118c-1.732 0-3.148 1.455-3.148 3.226c0 1.062.512 2.046 1.338 2.597c.433 1.22 1.613 2.124 2.95 2.124c1.732 0 3.148-1.456 3.148-3.226V1.534h2.872c.276.945.787 1.77 1.495 2.4a5.397 5.397 0 0 0 3.62 2.833"/><path d="M9.908 8.184V9.52c-3.777.118-6.806 3.226-6.806 7.043c0 1.377.393 2.636 1.062 3.738A7.122 7.122 0 0 1 2 15.148c0-3.896 3.148-7.043 7.003-7.043c.315 0 .63.04.905.079"/><path d="M16.203 1.534h-2.872v15.187c0 1.77-1.416 3.227-3.147 3.227c-1.377 0-2.518-.866-2.951-2.125c.511.354 1.14.59 1.81.59c1.73 0 3.147-1.416 3.147-3.187V0h3.817v.079c0 .157 0 .314.039.472c0 .315.079.669.157.983m5.115 3.777v1.417c-1.574-.315-2.911-1.377-3.659-2.794a5.11 5.11 0 0 0 3.659 1.377"/></g></svg>
          </a> --}}

          <p class="text-gray-100 ml-6 text-lg ">{{__('All copyrights © reserved 2024 to H5 Company')}}</p>
        </div>
      </div>
    </div>

  </div>
  </div>

  
<a href="{{route('home')}}" class="p-6 absolute top-0 left-0 z-10">
    <img class="w-20 fixed h-20 rounded-tr-[50%] rounded-br-[50%] rounded-bl-[50%] bg-white " src="{{asset('images/h5-logo.svg')}}" alt="">
</a>

<div class="flex gap-2 top-12 right-20 fixed z-30 h-20 "> 
  <a class="w-8 h-8" href="{{ route('locale', ['locale' => 'en']) }}">
    <img class=" rounded-full {{ Session::get('locale') == 'en' ? 'border-2 border-green-500 ' : ''}}" src="{{asset('images/istockphoto-668235920-612x612.jpg')}}" alt="">
  </a>
  <a class="w-8 h-8" href="{{ route('locale', ['locale' => 'ar']) }}">
    <img class="rounded-full {{ Session::get('locale') == 'ar' ? 'border-2 border-green-500 ' : ''}}" src="{{asset('images/iq-square-01.png')}}" alt="">
  </a>
  <div id="menu-button" class="all-btn ">
    <div class=""> 
        <div class="menu-btn-1" onclick="menuBtnFunction(this)">
            <span></span>
        </div>
    </div>
</div>
</div>


    <div id="menu" class="fixed z-20 flex  justify-center items-center w-full h-full bg-black opacity-[0.85]">
        <ul class="ml-10 ">
          <li><a href="{{route('home')}}" data-text="{{__('Home')}}">{{__('Home')}}</a></li>
          <li><a href="{{route('about')}}" data-text="{{__('About')}}">{{__('About')}}</a></li>
          <li><a href="{{route('store')}}" data-text="{{__('Store')}}">{{__('Store')}}</a></li>
          <li><a href="{{route('register')}}" data-text="{{__('Sign Up')}}">{{__('Sign Up')}}</a></li>
          <li><a href="{{route('login')}}" data-text="{{__('Login')}}">{{__('Login')}}</a></li>
        </ul>
    </div>
  


<script src="{{asset('particleJs/js/menu.js')}}"></script>

</html>