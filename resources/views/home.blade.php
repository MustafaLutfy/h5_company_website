<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>H5 Home</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{asset('particleJs/particles.css')}}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu-ul.css')}}">
  <link rel="stylesheet" href="{{asset('particleJs/css/menu.css')}}">
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
    <div class="w-[80%] mt-20 mb-40">
      <div class="">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8 ">WHO WE ARE</h2>
      </div>
      <p class="text-lg w-full text-gray-100">
        We are a company that cares about human resources.  We try to collect everything in one place.  In addition to the many opportunities.  The goal is to find a place that brings together freelancers , To make thier way easier than before.
      </p>
    </div>

    <div class="w-[80%] mb-40 bg-[#111111] opacity-[0.9]">
      <div class="">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8 ">OUR TEAM</h2>
      </div>
      <div class="flex gap-12 md:flex-row md:items-start items-center flex-col">
        <div class="">
          <div class="h-44 w-44 flex  items-center">
            <img class="rounded-lg" src="{{asset('images/Project (20240222112903).jpg')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">Hussain</h1>
          <h2 class="text-lg text-orange-400">CEO</h2>
        </div>
        <div>
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-23 013400.png')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">Mariam</h1>
          <h2 class="text-lg text-orange-400">Chief of Presidents</h2>
        </div>
        <div>
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-23 020232.png')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">Mustafa</h1>
          <h2 class="text-lg text-orange-400">Website Developer</h2>
        </div>
      </div>
      
    </div>

    <div class="flex flex-col  gap-4 h-[100%] w-full mt-40 justify-center items-center">
      <div class="w-[80%]">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8">Latest Updates</h2>
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
      
     


        <div class="w-[80%]">
          <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8">Our Branches</h2>
        </div>
        <div class="flex md:flex-row flex-col pb-12 gap-8">
          <div>
            <a href="{{route('store')}}" class="flex items-center justify-center text-center w-40 h-40 rounded-full border-4 border-orange-400 cursor-pointer transition hover:bg-[#212121]">
                <h1 class="text-2xl text-gray-100"><span class="text-2xl text-orange-400 font-semibold">H5 <br></span>STORE</h1>
            </a>
          </div>
          <a>
            <div class="flex items-center justify-center text-center w-40 h-40 rounded-full border-4 border-blue-400">
                <h1 class="text-2xl text-gray-100"><span class="text-2xl text-blue-400 font-semibold">SOON<br></span></h1>
            </div>
          </a>
          <a>
            <div class="flex items-center justify-center  text-center w-40 h-40 rounded-full border-4 border-green-400">
                <h1 class="text-2xl text-gray-100"><span class="text-2xl text-green-400 font-semibold">SOON<br></span></h1>
            </div>
          </div>
        </a>
        
    </div>
  </div>
  </div>

  
<a href="{{route('home')}}" class="p-6 absolute top-0 left-0 z-10">
    <img class="w-20 h-20 rounded-tr-[50%] rounded-br-[50%] rounded-bl-[50%] bg-white " src="{{asset('images/h5-logo.svg')}}" alt="">
</a>
<div id="menu-button" class="all-btn top-12 right-20 bg-red-300 fixed z-10">
    <div class="">
        <div class="menu-btn-1 absolute" onclick="menuBtnFunction(this)">
            <span></span>
        </div>
    </div>
</div>

    <div id="menu" class="absolute flex  justify-center items-center w-full h-full bg-black opacity-[0.85]">
        <ul class="ml-10">
          <li><a href="{{route('home')}}" data-text="Home">Home</a></li>
          <li><a href="{{route('about')}}" data-text="About">About</a></li>
          <li><a href="{{route('store')}}" data-text="Store">Store</a></li>
          <li><a href="{{route('register')}}" data-text="Sign Up">Sign Up</a></li>
          <li><a href="{{route('login')}}" data-text="Login">Login</a></li>
        </ul>
    </div>
  


<script src="{{asset('particleJs/js/menu.js')}}"></script>

</html>