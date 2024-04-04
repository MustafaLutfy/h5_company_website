<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>H5 Company</title>
  <meta name="description" content="H5 company landing page">
  <meta name="author" content="Mustafa Lutfy" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{asset('particleJs/particles.css')}}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu-ul.css')}}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu.css')}}">
  <link rel="icon" href="{{ url('images/h5-logo.svg') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: "Rubik", sans-serif;
      font-optical-sizing: auto;
      font-weight: 600;
      font-style: normal;
    }
  </style>
</head>

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


<a href="{{ route('home') }}" class="bg-orange-400 border-2 text-4xl px-20 rounded-full cursor-pointer  py-2 text-transpernt absolute m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2 transition duration-[0.3] hover:-translate-y-[38px] hover:drop-shadow-[0_5px_10px_rgba(255,255,255,0.3)]">
  {{ __('Start') }}
</a>
<div class="flex gap-2 top-12 right-10 fixed z-30 h-20 "> 
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
    <div id="menu" class="absolute flex  justify-center items-center w-full h-full bg-black opacity-[0.85]">
        <ul class="ml-10">
          <li><a href="{{route('home')}}" data-text="{{__('Home')}}">{{__('Home')}}</a></li>
          <li><a href="{{route('about')}}" data-text="{{__('About')}}">{{__('About')}}</a></li>
          <li><a href="{{route('store')}}" data-text="{{__('Store')}}">{{__('Store')}}</a></li>
          <li><a href="{{route('register')}}" data-text="{{__('Sign Up')}}">{{__('Sign Up')}}</a></li>
          <li><a href="{{route('login')}}" data-text="{{__('Login')}}">{{__('Login')}}</a></li>
        </ul>
    </div>
  


<script src="{{asset('particleJs/js/menu.js')}}"></script>

</html>