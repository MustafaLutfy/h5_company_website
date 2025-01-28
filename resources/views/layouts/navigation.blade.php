
<nav id="header" class="shadow-md w-full z-30 top-0 py-1">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>H5 Company Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-2" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block text-lg text-gray-800 no-underline hover:text-gray-800 hover:underline py-2 px-4" href="{{route('home')}}">{{__('Home')}}</a></li>
                    <li><a class="inline-block text-lg text-gray-800 no-underline hover:text-gray-800 hover:underline py-2 px-4" href="{{route('about')}}">{{__('About')}}</a></li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-1">
            <a href="{{route('home')}}" class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                <img class="w-12 h-12 mr-3 rounded-tr-[50%] tex rounded-br-[50%] rounded-bl-[50%] " src="{{asset('images/h5-logo.svg')}}" alt="">
                H5 COMPANY
            </a>
        </div>
      
        <div class="order-2 text-gray-800 md:order-3 flex items-center" id="nav-content">
            @if(!Auth::user())
            <a href="{{route('register')}}" class="inline-block no-underline hover:text-black" href="#">
                <svg class="fill-gray-800  hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle fill="none" cx="12" cy="7" r="3" />
                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                </svg>
            </a>
            @else
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a  :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();" 
                class="inline-block no-underline hover:text-black" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M9 12h12l-3-3m0 6l3-3"/></g></svg>
            </a>
            </form>
            @endif
            
    
            <a href="{{ route('cart.index') }}" class="relative">  
                <svg class="fill-gray-800 hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
                @if(Auth::check() && Auth::user()->cart && Auth::user()->cart->items->count() > 0)  
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">  
                        {{ Auth::user()->cart->items->count() }}  
                    </span>  
                @endif  
            </a>  
            <div class="flex items-center gap-2 ml-4 z-30 h-20 "> 
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
    </div>
</nav>