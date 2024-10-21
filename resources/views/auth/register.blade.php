@extends('layout.layout')

@section('title','register')

@section('content')
<body class="bg-stone-300 flex justify-center ">
    <div class="w-80 mt-10 ">
        <form class='bg-white h-auto rounded' action='{{route('post.register')}}' method='POST'>
            @csrf
            <div class="font-bold capitalize flex justify-center items-center pt-3 text-[20px] ">
                <h3>Sign up</h3>
            </div>
            <div class="flex flex-col m-3">
                <label for='name'>Name</label>
                <input class='h-8 border rounded focus:outline-none focus:border-blue-400 ' type="text" id='name' name='name'>
                @error('name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col m-3">
                <label for='email'>Email</label>
                <input class='h-8 border rounded focus:outline-none focus:border-blue-400 ' type="email" id='email' name='email'>
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="flex flex-col m-3">
                <label for='email'>Date of birth</label>
                <input class='h-8 border rounded focus:outline-none focus:border-blue-400 ' type="date" id='birthdate' name='birthdate'>
                @error('birthdate')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="flex flex-col m-3">
                <label for='phone_number'>Phone number</label>
                <input class='h-8 w-[295px] border rounded focus:outline-none focus:border-blue-400 ' type="tel" id='phone_number' name='phone_number'>

                <span id="valid-msg" class="hide"></span>
                <span id="error-msg" class="hide"></span>

                @error('phone_number')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="flex flex-col m-3">
                <label for='password'>Password</label>
                <input class='h-8 rounded border focus:outline-none focus:border-blue-400' type="text" id='password' name='password'>
                @error('password')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col m-3">
                <label for='passwordConfirm'>Password confirmation</label>
                <input class='h-8 rounded border focus:outline-none focus:border-blue-400' type="text" id='passwordConfirm' name='password_confirmation'>
                @error('passwordConfirm')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="my-4 ml-4">
                <p>choose your gender</p>
                <div class="flex">
                <div class="mr-2">
                    <input type='radio' id='gender' name='gender' value='Man'>
                    <label for="gender">Man</label>
                </div>
                <div class="mr-2">
                    <input type='radio' id='gender' name='gender' value='Woman'>
                    <label for="gender">Woman</label>
                </div>
                <div>
                    <input type='radio' id='gender' name='gender' value='non-binary'>
                    <label for="gender">Non binary</label>
                </div>
                </div>
                @error('gender')
                  <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="my-4 ml-4">
                <p>what are you ?</p>
                    <div class="flex">
                        <div class="mr-2">
                            <input type='radio' id='role' name='role' value='recrutor'>
                            <label for="role">recrutor</label>
                        </div>

                        <div class="mr-2">
                            <input type='radio' id='role' name='role' value='job-seeker'>
                            <label for="role">Job seeker</label>
                        </div>
                    </div>

                    @error('role')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
            </div>

            <div class="flex justify-between mb-5">
                <div class="ml-4 bg-blue-500 p-2 rounded text-white mb-8 w-20 h-10 text-center">
                    <input type='submit' value='Submit'>
                </div>
            </div>
        </form>

        <div class='ml-4'>
            <a href="{{route('login')}}"> Already  have an account ?</a>
        </div>
    </div>
</body>
@endsection