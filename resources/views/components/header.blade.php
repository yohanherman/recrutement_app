
{{-- connected as a recrutor --}}
@if(Auth::check() && Auth::user()->role == 'recrutor')
<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>
    <nav class="navbar h-16 w-full flex justify-between items-center ">
        <div class="mx-3">LOGO</div>
        <ul class="flex space-x-5 mx-5 text-[20px] ">
            <li>message</li>
            <li>notifications</li>
            <li class="hidden md:block"><i class="fa-solid fa-user"></i></li>
            <li class="burger md:hidden"><i class="fa-solid fa-bars"></i></li>
            <div class="hidden md:block"> | <a href="{{route('get.offerForm')}}">publish an offer</a></div>
        </ul>
    </nav>
    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'>
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div>
            <ul>
                    <div class="m-2 font-bold">
                        <li><a href="{{route('home.offers')}}">Home</a></li>
                    </div>
                <hr>
                    <div class="m-2 font-bold">
                        <li>Profile</li>
                    </div>
                <hr>
                    <div class="m-2">
                        <li class="font-bold">
                            <a href="#">Logout</a>
                        </li>
                        <p>{{ Auth::user()->email}}</p>
                        {{-- <p>{{ Auth::user()->role}}</p> --}}
                    </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

@elseif(Auth::check() && Auth::user()->role == 'job-seeker')

<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>

    <nav class="navbar h-16 w-full flex justify-between items-center ">
        <div class="mx-3">LOGO</div>
        <ul class="flex space-x-5 mx-5 text-[20px] ">
            <li>message</li>
            <li>notifications</li>
            <li class="hidden md:block"><i class="fa-solid fa-user"></i></li>
            <li class="burger md:hidden"><i class="fa-solid fa-bars"></i></li>
            {{-- <div class="hidden md:block"> | publish an offer</div> --}}
        </ul>
    </nav>

    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'>
            <i class="fa-solid fa-xmark"></i>
        </div>
            <ul>
                    <li>Home</li>
                <hr>
                    <li>Profile</li>
                <hr>
                    <div class="m-2">
                        <li class="font-bold"><a href="{{route('logout')}}">Deconnexion</a></li>
                        <p>{{ Auth::user()->email}}</p>
                        {{-- <p>{{ Auth::user()->role}}</p> --}}
                    </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

@else

<div>
    <div class="overlay fixed w-full h-full right-0 top-0 z-5 md:hidden"></div>

    <nav class="navbar h-16 w-full flex justify-between items-center ">
        <div class="mx-3">LOGO</div>
        <ul class="flex space-x-5 mx-5 text-[20px] ">
            <li>message</li>
            <li>notifications</li>
            <li class="hidden md:block"><i class="fa-solid fa-user"></i></li>
            <li class="burger md:hidden"><i class="fa-solid fa-bars"></i></li>
            {{-- <div class="hidden md:block"> | publish an offer</div> --}}
        </ul>
    </nav>

    <div class="sidebar_menu bg-white fixed top-0 right-0 h-full w-[60%] z-10 " >
        <div class='text-end m-3 text-[20px] burger_remove'><i class="fa-solid fa-xmark"></i></div>
            <ul>
                    <li>Home</li>
                <hr>
                    <li>Profile</li>
                <hr>
                <li>liste</li>
                <li>liste</li>
                <li>liste</li>
                <li>liste</li>
                <hr>
                <div class="m-2">
                    <li><a href="#">Connexion</a></li>
                    <div>hggf</div>
                </div>
                <hr>
            </ul>
        </div>
    </div>
</div>

@endif
    
   