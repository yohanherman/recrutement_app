@extends('layout.layout')

@section('title','Profile')
@section('content')

@include('components.header')

<div class="m-2 border">

<div class="my-5 text-center">
    <h1>My account</h1>
</div>

<div class="my-3 p-2 md:flex justify-center items-center ">
    <p>Hello {{$user->name}}, you are connected as <span class="font-bold">{{$user->email}}</span></p>
</div>


<div class="flex justify-center items-center m-2 text-white bg-green-500">
    @if(session()->has('success'))
    <p>{{session('success')}}</p>
    @elseif(session()->has('error'))
    <p>{{session('error')}}</p>
    @endif
</div>


@if(Auth::check())
<div class=" p-2">
    <img class='h-20 w-20 rounded-full' src="{{asset('images/NGATA0013.jpg')}}" alt="image">

    <div>
        <a class="flex justify-end mr-3" href='{{route('profile.edit', $user->id)}}'><i class="fa-solid fa-pencil"></i></a>
        <p class="font-bold capitalize my-1">{{$user->name}}</p>
        <p >Paris, France</p>
        <p>{{$user->email}}</p>
        <p>{{$user->phone_number}}</p>
        <p>{{$user->gender}}</p>
        <p>{{$user->birthdate}}</p>
    </div>

    <div class="my-3">
        <a class="bg-red-500 p-1 text-white rounded " href="">Delete account</a>
    </div>
</div>

@endif

</div>



@endsection