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

<script>  
    // Preload team members data  
    const teamMembers = @json($teamMembers);  
const currentLocale = "{{ Session::get('locale') }}";  

// Popup Functionality  
function showMemberPopup(memberId) {  
    const member = teamMembers.find(m => m.id === memberId);  
    console.log(member);  
    if (member) {  
        // Handle image source  
        document.getElementById('popup-image').src = `{{ asset('team_members/') }}/${member.image}`;  
        
        // Handle name based on locale  
        document.getElementById('popup-name').textContent = currentLocale === 'ar'   
            ? member.name_ar   
            : member.name_en;  
        
        // Handle role based on locale  
        document.getElementById('popup-role').textContent = currentLocale === 'ar'   
            ? member.role_ar   
            : member.role_en;  
        
        // Handle description based on locale  
        document.getElementById('popup-description').textContent = currentLocale === 'ar'   
            ? member.description_ar   
            : member.description_en;  
        
        // Handle text alignment based on locale  
        const popupContent = document.getElementById('member-popup');  
        if (currentLocale === 'ar') {  
            popupContent.classList.add('text-right');  
            popupContent.classList.remove('text-left');  
            // Optionally, adjust layout for RTL  
            popupContent.style.direction = 'rtl';  
        } else {  
            popupContent.classList.add('text-left');  
            popupContent.classList.remove('text-right');  
            popupContent.style.direction = 'ltr';  
        }  
        
        // Show the popup  
        document.getElementById('member-popup').classList.remove('hidden');  
    } else {  
        console.error('Member not found:', memberId);  
    }  
}  

function hideMemberPopup() {  
    document.getElementById('member-popup').classList.add('hidden');  
}
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
            <div class="flex {{ Session::get('locale') == 'ar' ? 'justify-end' : '' }} items-center md:flex-row flex-col gap-12">  
                @foreach($teamMembers as $member)  
                <button   
                    onclick="showMemberPopup({{ $member->id }})"   
                    class="w-44 pt-16 md:pt-4 {{ Session::get('locale') == 'ar' ? 'text-right' : 'text-left' }}"  
                >  
                    <div class="h-44 w-44 flex items-center">  
                        <img class="rounded-lg" src="{{ asset('team_members/' . $member->image) }}" alt="{{ $member->name_en }}">  
                    </div>  
                    <h1 class="text-xl text-gray-100 mt-3 {{ Session::get('locale') == 'ar' ? 'text-right' : 'text-left' }}">  
                        {{ Session::get('locale') == 'ar' ? $member->name_ar : $member->name_en }}  
                    </h1>  
                    <h2 class="text-lg text-orange-400 {{ Session::get('locale') == 'ar' ? 'text-right' : 'text-left' }}">  
                        {{ Session::get('locale') == 'ar' ? $member->role_ar : $member->role_en }}  
                    </h2>  
                    <h1 class="text-[16px] text-gray-100 mt-2 {{ Session::get('locale') == 'ar' ? 'text-right' : 'text-left' }}">  
                        {{ Session::get('locale') == 'ar' ? $member->description_ar : $member->description_en }}  
                    </h1>  
                </button>  
            @endforeach
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
            @if ($post->image)  
            <div class="col-span-1 flex items-center justify-center">  
                <img class="w-[60%] aspect-square object-cover rounded-full"  
                    src="{{ asset('news_images/' . $post->image) }}" alt="{{ $post->title }}">  
            </div>  
            @endif  
    
            <div class="text-gray-100 col-span-5 px-4">  
                <h2 class="text-xl font-semibold text-orange-400 line-clamp-2">{{ $post->title }}</h2>  
                <div class="w-full mt-2 text-lg prose prose-invert max-w-none" x-data="{ expanded: false }">  
                    <div x-show="!expanded">  
                        {!! Str::limit(strip_tags($post->content, '<a>'), 200) !!}  
                        @if (strlen(strip_tags($post->content)) > 200)  
                            <button @click="expanded = true"  
                                class="text-orange-400 hover:text-orange-300 text-sm font-medium">  
                                أقرأ أكثر   
                            </button>  
                        @endif  
                    </div>  
                    <div x-show="expanded">  
                        {!! $post->content !!}  
                        <button @click="expanded = false"  
                            class="text-orange-400 hover:text-orange-300 text-sm font-medium">  
                            عرض نص أقل  
                        </button>  
                    </div>  
                </div>  
                <div class="mt-2 text-sm text-gray-400">  
                    <span>Posted: {{ $post->created_at->diffForHumans() }}</span>  
                </div>  
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
        @endif  

        <div class="text-gray-100 col-span-5 px-4">  
            <h2 class="text-xl font-semibold text-orange-400 line-clamp-2">{{ $post->title }}</h2>  
            <div class="w-full mt-2 text-lg prose prose-invert max-w-none" x-data="{ expanded: false }">  
                <div x-show="!expanded">  
                    {!! Str::limit(strip_tags($post->content, '<a>'), 200) !!}  
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





<!-- Reusable Popup Component -->  
<div id="member-popup" class="bg-[#111111bb] h-screen w-screen fixed hidden">  
    <div class="md:w-[20%] w-[90%] h-[50%] absolute border-2 border-orange-400 rounded-xl bg-[#212121] left-[50%] top-[50%] -transform -translate-x-1/2 -translate-y-1/2">  
        <button onclick="hideMemberPopup()" type="button" class="text-right p-4 absolute right-0">  
            <svg class="stroke-gray-400 w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">  
                <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6m0 12L6 6" />  
            </svg>  
        </button>  
        <div class="w-full h-[50%] flex justify-center items-center">  
            <img id="popup-image" class="w-40 h-40 rounded-full border-4 border-orange-400" src="" alt="">  
        </div>  
        <div class="h-[18%] flex flex-col items-center">  
            <h1 id="popup-name" class="text-2xl font-semibold text-gray-100"></h1>  
            <h1 id="popup-role" class="text-lg font-thin text-orange-400 opacity-[0.7]"></h1>  
        </div>  
        <div class="h-[20%] flex flex-col items-center mx-8 my-6">  
            <h1 id="popup-description" class="text-[18px] text-gray-100"></h1>  
        </div>  
    </div>  
</div>  
        <script src="{{ asset('particleJs/js/about-menu.js') }}"></script>
        <script src="{{ asset('particleJs/js/info-card.js') }}"></script>

</html>
