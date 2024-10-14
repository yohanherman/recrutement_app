@extends('layout.layout')

@section('title','Login')


@section('content')
<body class="bg-stone-300 flex justify-center ">
    <div class="w-80 mt-80 ">
        <form class='bg-white h-auto rounded' action='{{route('post.login')}}' method='POST'>
            @csrf
            <div class="font-bold capitalize flex justify-center items-center pt-3 text-[20px] ">
                <h3>Login</h3>
            </div>
            <div class="flex flex-col m-3">
                <label for='email'>Email</label>
                <input class='h-8 border rounded focus:outline-none focus:border-blue-400 ' type="email" id='email' name='email'>
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col m-3">
                <label for='password'>password</label>
                <input class='h-8 rounded border focus:outline-none focus:border-blue-400' type="text" id='password' name='password'>
                @error('password')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex justify-between mb-5">
                <div class="ml-4">
                    <input type="radio" id='remember_me' name='remember_me' value='remember_me'/>
                    <label for="">Remember me</label>
                </div>
                <div class="mr-4 bg-blue-500 p-1 rounded text-white mb-8">
                    <input type='submit' value='Log in'>
                </div>
            </div>
        </form>
        <div class='ml-4'>
            <a href="#">Lost your password ?</a> <br>
            <a href="{{route('get.register')}}"> Don't have an account ?</a>
        </div>
    </div>
</body>
@endsection