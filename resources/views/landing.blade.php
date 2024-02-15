<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>particles.js</title>
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
<a href="{{ route('home') }}" class="bg-orange-400 border-2 text-4xl px-20 rounded-full cursor-pointer  py-2 text-transpernt absolute m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2 transition duration-[0.3] hover:-translate-y-[38px] hover:drop-shadow-[0_5px_10px_rgba(255,255,255,0.3)]">
  Start
</a>
<div class="p-6 absolute top-0 left-0">
    <img class="w-20 h-20 rounded-tr-[50%] rounded-br-[50%] rounded-bl-[50%] bg-white " src="{{asset('images/h5-logo.svg')}}" alt="">
</div>
<div id="menu-button" class="all-btn top-12 right-20 bg-red-300 fixed z-10">
    <div class="">
        <div class="menu-btn-1 absolute" onclick="menuBtnFunction(this)">
            <span></span>
        </div>
    </div>
</div>

    <div id="menu" class="absolute flex  justify-center items-center w-full h-full bg-black opacity-[0.85]">
        <ul class="ml-10">
            <li><a href="#" data-text="Home">Home</a></li>
            <li><a href="#" data-text="About">About</a></li>
            <li><a href="#" data-text="Services">Services</a></li>
            <li><a href="#" data-text="Our Team">Our Team</a></li>
            <li><a href="#" data-text="Contact">Contact</a></li>
        </ul>
    </div>
  


<script src="{{asset('particleJs/js/menu.js')}}"></script>

</html>