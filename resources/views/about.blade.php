<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About H5</title>
    <meta name="description" content="this page is full of information about H5 company">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('particleJs/particles.css') }}">
    <link rel="icon" href="{{ url('images/h5-logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('particleJs/css/menu-ul.css') }}">
    <link rel="stylesheet" href="{{ asset('particleJs/css/menu.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
<div id="particles-js">


</div>



<!-- scripts -->
<script src="{{ asset('particleJs/particles.js') }}"></script>
<script src="{{ asset('particleJs/js/app.js') }}"></script>

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

<a href="{{ route('home') }}" class="p-6 absolute top-0 left-0 z-10">
    <img class="w-20 fixed h-20 rounded-tr-[50%] rounded-br-[50%] rounded-bl-[50%] bg-white "
        src="{{ asset('images/h5-logo.svg') }}" alt="">
</a>

<div class="flex gap-2 top-12 right-10 fixed z-30 h-20 ">
    <a class="w-8 h-8" href="{{ route('locale', ['locale' => 'en']) }}">
        <img class=" rounded-full {{ Session::get('locale') == 'en' ? 'border-2 border-green-500 ' : '' }}"
            src="{{ asset('images/istockphoto-668235920-612x612.jpg') }}" alt="">
    </a>
    <a class="w-8 h-8" href="{{ route('locale', ['locale' => 'ar']) }}">
        <img class="rounded-full {{ Session::get('locale') == 'ar' ? 'border-2 border-green-500 ' : '' }}"
            src="{{ asset('images/iq-square-01.png') }}" alt="">
    </a>
    <div id="menu-button" class="all-btn ">
        <div class="">
            <div class="menu-btn-1" onclick="menuBtnFunction(this)">
                <span></span>
            </div>
        </div>
    </div>
</div>

<div class="w-full h-full z-20">
    <div id="about-menu"
        class="absolute z-10 flex justify-center items-center w-screen h-screen bg-black opacity-[0.85]">
        <ul class="ml-10">
            <li><a href="{{ route('home') }}" data-text="{{ __('Home') }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('about') }}" data-text="{{ __('About') }}">{{ __('About') }}</a></li>
            <li><a href="{{ route('store') }}" data-text="{{ __('Store') }}">{{ __('Store') }}</a></li>
            <li><a href="{{ route('register') }}" data-text="{{ __('Sign Up') }}">{{ __('Sign Up') }}</a></li>
            <li><a href="{{ route('login') }}" data-text="{{ __('Login') }}">{{ __('Login') }}</a></li>
        </ul>
    </div>
</div>


<div
    class="w-[80%] h-screen bg-[#111111] {{ Session::get('locale') == 'ar' ? 'text-right' : '' }} opacity-[0.9] absolute m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">

    <div class="flex flex-col items-center gap-4 h-[50%] mt-4">
        @if (Session::get('locale') == 'ar')
            <div class="flex h-[80%] my-20 items-center w-[80%]">
                <img class="w-[40%]  md:block hidden mt-16 rounded-lg p-10"
                    src="{{ asset('images/undraw_add_information_j2wg.svg') }}" alt="">
                <div class="md:pl-48 w-full ml-auto md:w-[50%]">
                    <div class="w-full">
                        <h2 class="text-orange-400 w-full text-2xl border-b-2 pb-2 border-orange-400 my-8 ">
                            {{ __('About Us') }}</h2>
                    </div>
                    <p class="text-lg w-full text-gray-100 ">
                        {{ __('We are a company that cares about human resources.  We try to collect everything in one place.  In addition to the many opportunities.  The goal is to find a place that brings together freelancers , To make thier way easier than before.') }}
                    </p>
                </div>
            </div>
        @else
            <div class="flex h-[80%] my-20 items-center w-[80%]">
                <div class="md:pr-48 w-full mr-auto md:w-[50%]">
                    <div class="w-full">
                        <h2 class="text-orange-400 w-full text-2xl border-b-2 pb-2 border-orange-400 my-8 ">
                            {{ __('About Us') }}</h2>
                    </div>
                    <p class="text-lg w-full text-gray-100 ">
                        {{ __('We are a company that cares about human resources.  We try to collect everything in one place.  In addition to the many opportunities.  The goal is to find a place that brings together freelancers , To make thier way easier than before.') }}
                    </p>
                </div>
                <img class="w-[40%]  md:block hidden mt-16 rounded-lg p-10"
                    src="{{ asset('images/undraw_add_information_j2wg.svg') }}" alt="">
            </div>
        @endif


        <div class="md:w-[80%] w-full mb-40 bg-[#111111]">
            <div class="">
                <h2 class="text-orange-400 text-2xl border-b-2 pb-2 border-orange-400 my-8 ">{{ __('OUR TEAM') }}</h2>
            </div>
            <div
                class="flex {{ Session::get('locale') == 'ar' ? 'justify-end' : '' }} items-center md:flex-row flex-col gap-12">
                <button onclick="infoCardBtnFunction1()" class="w-44 pt-16 md:pt-4">
                    <div class="h-44 w-44 flex items-center">
                        <img class="rounded-lg" src="{{ asset('images/Project (20240222112903).jpg') }}"
                            alt="">
                    </div>
                    <h1
                        class="text-xl text-gray-100 text-left mt-3 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Hussain') }}</h1>
                    <h2
                        class="text-lg text-orange-400 text-left {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('CEO') }}</h2>
                    <h1
                        class="text-[16px] text-gray-100 text-left mt-2 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('When you step into the universe') }}</h1>
                </button>

                <button type="submit" onclick="infoCardBtnFunction2()" class="w-44 pt-12 md:pt-0">
                    <div class="h-44 w-44 flex items-center">
                        <img class="rounded-lg" src="{{ asset('images/Screenshot 2024-02-25 011943.png') }}"
                            alt="">
                    </div>
                    <h1
                        class="text-xl text-left text-gray-100 mt-3 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('T A I F') }}</h1>
                    <h2
                        class="text-lg text-left text-orange-400 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Graphic Designer') }}</h2>
                    <h1
                        class="text-[16px] text-gray-100 text-left mt-2 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Talented, Able , Intelligent, Fascinating') }}</h1>
                </button>


                <button onclick="infoCardBtnFunction3()" class="w-44 pt-12 md:pt-0">
                    <div class="h-44 w-44 flex items-center">
                        <img class="rounded-lg" src="{{ asset('images/Screenshot 2024-02-23 020232.png') }}"
                            alt="">
                    </div>
                    <h1
                        class="text-xl text-left text-gray-100 mt-3 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Mustafa') }}</h1>
                    <h2
                        class="text-lg text-left text-orange-400 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Website Developer') }}</h2>
                    <h1
                        class="text-[16px] text-gray-100 text-left mt-2 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('The Technical Touch') }}</h1>
                </button>
                <button type="submit" onclick="infoCardBtnFunction4()" class="w-44 pt-12 md:pt-0">
                    <div class="h-44 w-44 rounded-lg bg-black flex items-center">
                        <img class="rounded-lg " src="{{ asset('images/photo_2024-03-20_02-39-03.jpg') }}"
                            alt="">
                    </div>
                    <h1
                        class="text-xl text-left text-gray-100 mt-3 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('ALEENA') }}</h1>
                    <h2
                        class="text-lg text-left text-orange-400 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Voice Over') }}</h2>
                    <h1
                        class="text-[16px] text-gray-100 text-left mt-2 {{ Session::get('locale') == 'ar' ? 'text-right' : '' }}">
                        {{ __('Roses don’t know when they’re dead') }}</h1>
                </button>



            </div>
        </div>
        <div class="flex flex-col gap-4 h-[100%] md:w-[80%] w-[100%] justify-center items-center">
            <div class="w-full">
                <h2 class="text-orange-400 text-2xl border-b-2 pb-2 border-orange-400 my-8">{{ __('Latest Updates') }}
                </h2>
            </div>
        </div>
        @if (Session::get('locale') == 'ar')
        @foreach ($posts as $post)
        <div class="grid grid-cols-6 w-[80%] h-auto bg-[#212121] rounded-lg py-4 mb-4">
            <div class="text-gray-100 col-span-5 px-4">
                <h2 class="text-xl font-semibold text-orange-400 line-clamp-2">{{ $post->title }}</h2>
                <div class="w-full mt-2 text-lg direction-rtl prose prose-invert max-w-none" x-data="{ expanded: false }">
                    <div x-show="!expanded">
                        {!! Str::limit(strip_tags($post->content), 200) !!}
                        @if (strlen(strip_tags($post->content)) > 200)
                            <button @click="expanded = true"
                                class="text-orange-400 hover:text-orange-300 text-sm font-medium">
                                أظهار المزيد
                            </button>
                        @endif
                    </div>
                    <div x-show="expanded">
                        {!! $post->content !!}
                        <button @click="expanded = false"
                            class="text-orange-400 hover:text-orange-300 text-sm font-medium">
                            أخفاء المزيد
                        </button>
                    </div>
                </div>
                <div class="mt-2 text-sm text-gray-400">
                    <span>Posted: {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="col-span-1 flex items-center justify-center">
              <img class="w-[60%] aspect-square object-cover rounded-full"
                  src="{{ asset('news_images/' . $post->image) }}" alt="{{ $post->title }}">
          </div>
        </div>
    @endforeach
    @else
    @foreach ($posts as $post)
        <div class="grid grid-cols-6 w-[80%] h-auto bg-[#212121] rounded-lg py-4 mb-4">
          @if ($post->image)
          <div class="col-span-1 flex items-center justify-center">
            <img class="w-[60%] aspect-square object-cover rounded-full"
                src="{{ asset('news_images/' . $post->image) }}" alt="{{ $post->title }}">
          </div>
          @else
          {{-- <div class="col-span-1 flex items-center justify-center">
            <div class="w-[60%] aspect-square object-cover rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#d0d0d0" d="M18.75 20H5.25a3.25 3.25 0 0 1-3.245-3.066L2 16.75V6.25a2.25 2.25 0 0 1 2.096-2.245L4.25 4h12.5a2.25 2.25 0 0 1 2.245 2.096L19 6.25V7h.75a2.25 2.25 0 0 1 2.245 2.096L22 9.25v7.5a3.25 3.25 0 0 1-3.066 3.245zH5.25zm-13.5-1.5h13.5a1.75 1.75 0 0 0 1.744-1.607l.006-.143v-7.5a.75.75 0 0 0-.648-.743L19.75 8.5H19v7.75a.75.75 0 0 1-.648.743L18.25 17a.75.75 0 0 1-.743-.648l-.007-.102v-10a.75.75 0 0 0-.648-.743L16.75 5.5H4.25a.75.75 0 0 0-.743.648L3.5 6.25v10.5a1.75 1.75 0 0 0 1.606 1.744zh13.5zm6.996-4h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.493zh3.006zm-3.003-3.495a.75.75 0 0 1 .75.75v3.495a.75.75 0 0 1-.75.75H5.748a.75.75 0 0 1-.75-.75v-3.495a.75.75 0 0 1 .75-.75zm-.75 1.5H6.498V14.5h1.995zm3.753-1.5h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.494zh3.006zM5.748 7.502h9.504a.75.75 0 0 1 .102 1.494l-.102.006H5.748a.75.75 0 0 1-.102-1.493zh9.504z"/></svg>
            </div>
          </div> --}}
          @endif
          
            <div class="text-gray-100 col-span-5 px-4">
                <h2 class="text-xl font-semibold text-orange-400 line-clamp-2">{{ $post->title }}</h2>
                <div class="w-full mt-2 text-lg prose prose-invert max-w-none" x-data="{ expanded: false }">
                    <div x-show="!expanded">
                        {!! Str::limit(strip_tags($post->content), 200) !!}
                        @if (strlen(strip_tags($post->content)) > 200)
                            <button @click="expanded = true"
                                class="text-orange-400 hover:text-orange-300 text-sm font-medium">
                                Read More
                            </button>
                        @endif
                    </div>
                    <div x-show="expanded">
                        {!! $post->content !!}
                        <button @click="expanded = false"
                            class="text-orange-400 hover:text-orange-300 text-sm font-medium">
                            Show Less
                        </button>
                    </div>
                </div>
                <div class="mt-2 text-sm text-gray-400">
                    <span>Posted: {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    @endforeach
    @endif

        <div class="pt-20 text-[#111111]">.</div>
    </div>

</div>

</div>
</div>
</div>

<div>






    <div id="info-card-1" class="bg-[#111111bb] h-screen w-screen fixed hidden">
        <div
            class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
            <button onclick="infoCardBtnFunction1()" type="button" class=" text-right p-4 absolute right-0">
                <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6m0 12L6 6" />
                </svg>
            </button>
            <div class="w-full h-[50%] flex justify-center items-center">
                <img class="w-40 h-40 rounded-full border-4 border-orange-400"
                    src="{{ asset('images/Project (20240222112903).jpg') }}" alt="">
            </div>
            <div class="h-[18%] flex flex-col items-center">
                <h1 class="text-2xl font-semibold text-gray-100">{{ __('Hussain') }}</h1>
                <h1 class="text-lg font-thin  text-orange-400 opacity-[0.7]">{{ __('CEO') }}</h1>
            </div>
            <div class="h-[20%] flex flex-col justify-center items-center mx-8 my-8">
                <h1 class="text-[16px] text-gray-100">
                    {{ __('Founder of the H5 idea. One of its main pillars.  He is the only financier. He aspires to create a place that contains everything in one thing.') }}
                </h1>
                <div class="p-6 flex gap-6">
                </div>
            </div>
        </div>
    </div>

    <div id="info-card-2" class="bg-[#111111bb] h-screen w-screen fixed hidden">
        <div
            class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
            <button onclick="infoCardBtnFunction2()" type="button" class=" text-right p-4 absolute right-0">
                <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6m0 12L6 6" />
                </svg>
            </button>
            <div class="w-full h-[50%] flex justify-center items-center">
                <img class="w-40 h-40 rounded-full border-4 border-orange-400"
                    src="{{ asset('images/Screenshot 2024-02-25 011943.png') }}" alt="">
            </div>
            <div class="h-[18%] flex flex-col items-center">
                <h1 class="text-2xl font-semibold text-gray-100">{{ __('T A I F') }}</h1>
                <h1 class="text-lg font-thin text-orange-400 opacity-[0.7]">{{ __('Graphic Designer') }}</h1>
            </div>
            <div class="h-[20%] flex flex-col items-center">
                <div class="h-[20%] flex flex-col items-center mx-8 my-2">
                    <h1 class="text-[16px] text-gray-100">
                        {{ __('My name is Taif Husham. I live to love and search for joy every day, I am studying software engineering while also working as a graphic designer.') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div id="info-card-3" class="bg-[#111111bb] h-screen w-screen fixed hidden">
        <div
            class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
            <button onclick="infoCardBtnFunction3()" type="button" class=" text-right p-4 absolute right-0">
                <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6m0 12L6 6" />
                </svg>
            </button>
            <div class="w-full h-[50%] flex justify-center items-center">
                <img class="w-40 h-40 rounded-full border-4 border-orange-400"
                    src="{{ asset('images/Screenshot 2024-02-23 020232.png') }}" alt="">
            </div>
            <div class="h-[18%] flex flex-col items-center">
                <h1 class="text-2xl  font-semibold text-gray-100">{{ __('Mustafa') }}</h1>
                <h1 class="text-lg font-thin  text-orange-400 opacity-[0.7]">{{ __('Website Developer') }}</h1>
            </div>
            <div class="h-[20%] flex flex-col items-center mx-8 my-6">
                <h1 class="text-[18px] text-gray-100">
                    {{ __('The Website Developer and the technical specialist of H5 Company.') }}</h1>
            </div>
        </div>
    </div>
    <div id="info-card-4" class="bg-[#111111bb] h-screen w-screen fixed hidden">
        <div
            class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] m-auto left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">
            <button onclick="infoCardBtnFunction4()" type="button" class=" text-right p-4 absolute right-0">
                <svg class="stroke-gray-400  w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6m0 12L6 6" />
                </svg>
            </button>
            <div class="w-full h-[50%] flex justify-center items-center">
                <img class="w-40 h-40 rounded-full border-4 border-orange-400"
                    src="{{ asset('images/photo_2024-03-20_02-39-03.jpg') }}" alt="">
            </div>
            <div class="h-[18%] flex flex-col items-center">
                <h1 class="text-2xl  font-semibold text-gray-100">{{ __('ALEENA') }}</h1>
                <h1 class="text-lg font-thin  text-orange-400 opacity-[0.7]">{{ __('Voice Over') }}</h1>
            </div>
            <div class="h-[20%] flex flex-col items-center mx-8 my-6">
                <h1 class="text-[18px] text-gray-100">{{ __('Just a girl with a mic and an amazing accent.') }}</h1>
            </div>
        </div>


        <script src="{{ asset('particleJs/js/about-menu.js') }}"></script>
        <script src="{{ asset('particleJs/js/info-card.js') }}"></script>

</html>
