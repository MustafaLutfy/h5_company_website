<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>About H5</title>
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
<div id="particles-js">

  
</div>



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

<a href="{{route('home')}}" class="p-6 absolute top-0 left-0 z-10">
  <img class="w-20 fixed h-20 rounded-tr-[50%] rounded-br-[50%] rounded-bl-[50%] bg-white " src="{{asset('images/h5-logo.svg')}}" alt="">
</a>
<div id="menu-button" class="all-btn top-12 right-20 bg-red-300 fixed z-30">
  <div class="z-20">
      <div class="menu-btn-1 absolute" onclick="aboutMenuBtnFunction(this)">
          <span></span>
      </div>
  </div>
</div>
<div class="w-full h-full z-20">
  <div id="about-menu" class="absolute z-10 flex justify-center items-center w-screen h-screen bg-black opacity-[0.85]">
      <ul class="ml-10">
        <li><a href="{{route('home')}}" data-text="Home">Home</a></li>
        <li><a href="{{route('about')}}" data-text="About">About</a></li>
        <li><a href="{{route('store')}}" data-text="Store">Store</a></li>
        <li><a href="{{route('register')}}" data-text="Sign Up">Sign Up</a></li>
        <li><a href="{{route('login')}}" data-text="Login">Login</a></li>
      </ul>
  </div>
</div>


<div class="w-[80%] h-screen bg-[#111111] opacity-[0.9] absolute m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
  <div class="flex h-[50%] mt-20 items-center ">
    <div class="md:px-40 mt-20 w-full md:w-[50%]">
      <div class="">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8 ">About Us</h2>
      </div>
      <p class="text-lg w-full text-gray-100">
        We are a company that cares about human resources.  We try to collect everything in one place.  In addition to the many opportunities.  The goal is to find a place that brings together freelancers , To make thier way easier than before.
      </p>    
    </div>
    <img class="w-[30%] ml-[10%] md:block hidden mt-16 rounded-lg p-10" src="{{asset('images/undraw_add_information_j2wg.svg')}}" alt="">
  </div>
  <div class="flex flex-col items-center gap-4 h-[50%] mt-4">
    <div class="w-[80%] mt-20 ">
    
    </div>

    <div class="md:w-[80%] w-full mb-40 bg-[#111111]">
      <div class="">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8 ">OUR TEAM</h2>
      </div>
      <div class="flex items-center md:flex-row flex-col gap-12">
        <button onclick="infoCardBtnFunction1()" class="w-44 pt-16 md:pt-4">
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Project (20240222112903).jpg')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 text-left mt-3">Hussain</h1>
          <h2 class="text-lg text-orange-400 text-left">CEO</h2>
          <h1 class="text-[16px] text-gray-100 text-left mt-2">When you step into the universe</h1>
        </button>

        <button type="submit" onclick="infoCardBtnFunction2()" class="w-44 pt-12 md:pt-0">
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-25 011943.png')}}" alt="">
          </div>
          <h1 class="text-xl text-left text-gray-100 mt-3">T A I F</h1>
          <h2 class="text-lg text-left text-orange-400">Graphic Designer</h2>
          <h1 class="text-[16px] text-gray-100 text-left mt-2">Talented, Able , Intelligent, Fascinating</h1>
        </button>

        <button onclick="infoCardBtnFunction3()" class="w-44 pt-12 md:pt-0"> 
          <div class="h-44 w-44 flex items-center">
            <img class="rounded-lg" src="{{asset('images/Screenshot 2024-02-23 020232.png')}}" alt="">
          </div>
          <h1 class="text-xl text-gray-100 mt-3">Mustafa</h1>
          <h2 class="text-lg text-left text-orange-400">Website Developer</h2>
          <h1 class="text-[16px] text-gray-100 text-left mt-2">The Technical Touch</h1>
        </div>
      </button>
     
    </div>
    
    <div class="flex flex-col gap-4 h-[100%] md:w-[80%] w-[100%] justify-center items-center">
      <div class="w-full">
        <h2 class="text-orange-400 text-2xl border-b-2 border-orange-400 my-8">Latest Updates</h2>
      </div>
    </div>
      <div class="flex md:flex-row flex-col w-[80%] gap-12 pb-12 bg-[#111111]">
       
      
        <div class="md:w-[80%] flex gap-4">
          <div class="flex flex-col  xl:w-[100%] h-full bg-[#212121] rounded-lg py-4">
            <div class="flex items-center justify-center h-full">
              <img class="w-[60%] rounded-full " src="{{asset('images/photo_2024-02-14_20-11-33.jpg')}}" alt="">
            </div>
            <div class="text-gray-100 col-span-5 px-4 ">
              <h2 class="text-xl font-semibold text-orange-400">Title</h2>
              <p class="w-full mt-2 text-[16px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident accusamus officiis modi consequatur impedit aut nostrum. Iure culpa possimus, aliquid velit itaque suscipit earum nemo non blanditiis, explicabo quibusdam minima.</p>
            </div>
         </div>
        </div>
        <div class="md:w-[80%] flex gap-4">
          <div class="flex flex-col  xl:w-[100%] h-full bg-[#212121] rounded-lg py-4">
            <div class="flex items-center justify-center h-full">
              <img class="w-[60%] rounded-full " src="{{asset('images/photo_2024-02-14_20-11-33.jpg')}}" alt="">
            </div>
            <div class="text-gray-100 col-span-5 px-4 ">
              <h2 class="text-xl font-semibold text-orange-400">Title</h2>
              <p class="w-full mt-2 text-[16px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident accusamus officiis modi consequatur impedit aut nostrum. Iure culpa possimus, aliquid velit itaque suscipit earum nemo non blanditiis, explicabo quibusdam minima.</p>
            </div>
         </div>
        </div>
        <div class="md:w-[80%] flex gap-4">
          <div class="flex flex-col  xl:w-[100%] h-full bg-[#212121] rounded-lg py-4">
            <div class="flex items-center justify-center h-full">
              <img class="w-[60%] rounded-full " src="{{asset('images/photo_2024-02-14_20-11-33.jpg')}}" alt="">
            </div>
            <div class="text-gray-100 col-span-5 px-4 ">
              <h2 class="text-xl font-semibold text-orange-400">Title</h2>
              <p class="w-full mt-2 text-[16px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident accusamus officiis modi consequatur impedit aut nostrum. Iure culpa possimus, aliquid velit itaque suscipit earum nemo non blanditiis, explicabo quibusdam minima.</p>
            </div>
         </div>
        </div>
        <div class="md:w-[80%] flex gap-4">
          <div class="flex flex-col  xl:w-[100%] h-full bg-[#212121] rounded-lg py-4">
            <div class="flex items-center justify-center h-full">
              <img class="w-[60%] rounded-full " src="{{asset('images/photo_2024-02-14_20-11-33.jpg')}}" alt="">
            </div>
            <div class="text-gray-100 col-span-5 px-4 ">
              <h2 class="text-xl font-semibold text-orange-400">Title</h2>
              <p class="w-full mt-2 text-[16px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident accusamus officiis modi consequatur impedit aut nostrum. Iure culpa possimus, aliquid velit itaque suscipit earum nemo non blanditiis, explicabo quibusdam minima.</p>
            </div>
         </div>
        </div>
      </div>
      
 </div>
        
    </div>
  </div>
  </div>

<div>






<div id="info-card-1" class="bg-[#111111bb] h-screen w-screen fixed hidden">
  <div class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
    <button onclick="infoCardBtnFunction1()" type="button" class=" text-right p-4 absolute right-0">
      <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6m0 12L6 6"/></svg>    
    </button>
    <div class="w-full h-[50%] flex justify-center items-center">
        <img class="w-40 h-40 rounded-full border-4 border-orange-400" src="{{asset('images/Project (20240222112903).jpg')}}" alt="">
    </div>
    <div class="h-[18%] flex flex-col items-center">
        <h1 class="text-2xl font-semibold text-gray-100">Hussain</h1>
        <h1 class="text-lg font-thin  text-orange-400 opacity-[0.7]">CEO</h1>
    </div>
    <div class="h-[20%] flex flex-col justify-center items-center mx-8 my-8">
        <h1 class="text-[16px] text-gray-100">Founder of the H5 idea.  One of its main pillars.  He is the only financier.
          He aspires to create a place that contains everything in one thing.</h1>
        <div class="p-6 flex gap-6">
      </div>
  </div>
</div>
</div>

<div id="info-card-2" class="bg-[#111111bb] h-screen w-screen fixed hidden">
  <div class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
    <button onclick="infoCardBtnFunction2()" type="button" class=" text-right p-4 absolute right-0">
      <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6m0 12L6 6"/></svg>    
    </button>
    <div class="w-full h-[50%] flex justify-center items-center">
        <img class="w-40 h-40 rounded-full border-4 border-orange-400" src="{{asset('images/Screenshot 2024-02-25 011943.png')}}" alt="">
    </div>
    <div class="h-[18%] flex flex-col items-center">
        <h1 class="text-2xl font-semibold text-gray-100">T A I F</h1>
        <h1 class="text-lg font-thin text-orange-400 opacity-[0.7]">Graphic Designer</h1>
    </div>
    <div class="h-[20%] flex flex-col items-center">
      <div class="h-[20%] flex flex-col items-center mx-8 my-2">
        <h1 class="text-[16px] text-gray-100">My name is Taif Husham. I live to love and search for joy every day, I am studying software engineering while also working as a graphic designer.</h1>
      </div>
  </div>
  </div>
</div>
<div id="info-card-3" class="bg-[#111111bb] h-screen w-screen fixed hidden">
  <div class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
    <button onclick="infoCardBtnFunction3()" type="button" class=" text-right p-4 absolute right-0">
      <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6m0 12L6 6"/></svg>    
    </button>
    <div class="w-full h-[50%] flex justify-center items-center">
        <img class="w-40 h-40 rounded-full border-4 border-orange-400" src="{{asset('images/Screenshot 2024-02-23 020232.png')}}" alt="">
    </div>
    <div class="h-[18%] flex flex-col items-center">
        <h1 class="text-2xl font-semibold text-gray-100">Mustafa L.</h1>
        <h1 class="text-lg font-thin  text-orange-400 opacity-[0.7]">Website Developer</h1>
    </div>
    <div class="h-[20%] flex flex-col items-center mx-8 my-6">
      <h1 class="text-[18px] text-gray-100">The Website Developer and the technical specialist of H5 Company.</h1>
    </div>
</div>

<script src="{{asset('particleJs/js/about-menu.js')}}"></script>
<script src="{{asset('particleJs/js/info-card.js')}}"></script>
</html>