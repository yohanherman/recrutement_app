
{{-- connected as a recrutor --}}
@if(Auth::check() && Auth::user()->role == 'recrutor')
<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>
    <nav class="navbar h-20 w-full flex justify-between items-center  bg-blue-950">
        <div class="flex justify-center items-center text-white">
            <div class="mx-3 font-bold text-[20px] mb-2 md:text-[27px]">LOGO</div>
        </div>
        <ul class="flex space-x-5 mx-5 text-[20px] text-white ">
            <li class="hidden md:block">
                <a href='{{route('recrutor.application')}}'>
                        <i class="fa-solid fa-book-bookmark"></i>
                    @if($applicationReceived)
                        <span class="relative bottom-3 bg-white text-black px-2 rounded-full">{{$applicationReceived}}</span>
                    @endif
                </a>
            </li>
            <li class="hidden md:block">

             {{-- debut drop down --}}
            <div class="hs-dropdown [--strategy:absolute] [--flip:false] hs-dropdown-example relative hidden md:block">
                <button id="hs-dropdown-example" type="button" class="hs-dropdown-toggle p-1 inline-flex items-center gap-x-2 text-sm font-medium  disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 " aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <i class="fa-solid fa-user text-[20px]"></i>
                </button>
              
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('home.offers')}}">
                    Home
                  </a>
                  {{-- <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                    Purchases
                  </a> --}}
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route ('get.profile')}}">
                    Profile
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('logout')}}">
                    Deconnexion
                  </a>
                </div>
              </div>
            {{-- fin drop down --}} 
            </li>


            <li class="burger md:hidden">
                <i class="fa-solid fa-bars"></i>
            </li>

            <div class="hidden md:block"> | <a class="publish_offer" href="{{route('get.offerForm')}}">publish an offer</a></div>
        </ul>
    </nav>
    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'>
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div>
            <ul>
                    <div class="m-2 font-bold">
                        <li>
                            <a href="{{route('home.offers')}}">Home</a>
                        </li>
                    </div>
                <hr>
                    <div class="m-2">
                        <li>
                            <a href="{{ route('get.profile')}}">Profile</a>
                        </li>
                    </div>
                <hr>
                    <div class="m-2">
                        <li>
                            <a href="{{route('logout')}}">Logout</a>
                        </li>
                        <p>{{ Auth::user()->email}}</p>
                    </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

{{-- connected as job- seeker --}}
@elseif(Auth::check() && Auth::user()->role == 'job-seeker')

<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>

    <nav class="navbar h-16 w-full flex justify-between items-center  bg-blue-950 ">
        <div class="flex justify-center items-center  text-white">
            <div class="mx-3 font-bold text-[20px] mb-2 md:text-[27px]">
                <a href="{{ route('home.offers')}}">LOGO</a>
            </div>
        </div>
        <ul class="flex space-x-5 mx-5 text-[15px] text-white ">
            <li><i class="fa-solid fa-message"></i></li>
            <li><i class="fa-solid fa-bell"></i></li>


             {{-- debut drop down --}}
            <div class="hs-dropdown [--strategy:absolute] [--flip:false] hs-dropdown-example relative hidden md:block">
                <button id="hs-dropdown-example" type="button" class="hs-dropdown-toggle p-1 inline-flex items-center gap-x-2 text-sm font-medium  disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 " aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <i class="fa-solid fa-user"></i>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('home.offers')}}">
                      Home
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('application.followup')}}">
                      Applications
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route ('get.profile')}}">
                      Profile
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('logout')}}">
                      Deconnexion
                  </a>
                </div>
              </div>
            {{-- fin drop down --}}


            <li class="burger md:hidden"><i class="fa-solid fa-bars"></i></li>
        </ul>
    </nav>

    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'>
            <i class="fa-solid fa-xmark"></i>
        </div>
            <ul>
                    <div class="m-2">
                        <li><a href="{{route('home.offers')}}">Home</a></li>
                    </div>
                <hr>
                    <div class="m-2">
                        <a href="{{ route('get.profile')}}">Profile</a>
                    </div>
                <hr>
                    <div class="m-2">
                        <li class="font-bold"><a href="{{route('logout')}}">Deconnexion</a></li>
                        <p>{{ Auth::user()->email}}</p>
                    </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

@else

<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>

    <nav class="navbar h-16 w-full flex justify-between items-center bg-blue-950 ">
        <div class="flex justify-center items-center  text-white">
            <div class="mx-3 font-bold text-[20px] mb-2 md:text-[27px]">
                <a href="{{ route('home.offers')}}">LOGO</a>
            </div>
        </div>
        <ul class="flex space-x-5 mx-5 text-[15px] text-white ">

            {{-- debut drop down --}}
            <div class="hs-dropdown [--strategy:absolute] [--flip:false] hs-dropdown-example relative hidden md:block">
                <button id="hs-dropdown-example" type="button" class="hs-dropdown-toggle p-1 inline-flex items-center gap-x-2 text-sm font-medium  disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 " aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <i class="fa-solid fa-user"></i>
                </button>
              
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('home.offers')}}">
                    Home
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('login')}}">
                    Connexion
                  </a>
                </div>
              </div>
            {{-- fin drop down --}}

            <li class="burger md:hidden"><i class="fa-solid fa-bars"></i></li>
        </ul>
    </nav>

    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'><i class="fa-solid fa-xmark"></i></div>
            <ul>
                <div class="m-2">
                    <li>Home</li>
                </div>
                <hr>
                <div class="m-2">
                    <li>Profile</li>
                </div>
                <hr>
                <hr>
                <div class="m-2">
                    <li><a href="{{ route('login')}}">Connexion</a></li>
                </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

@endif
    
   