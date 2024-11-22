@extends('layout.layout')

@section('title', 'Details')

@section('content')

@include('components.header')

<div class="mt-8 ml-3 text-[23px]">
    <a href="{{route('recrutor.application')}}"><i class="fa-solid fa-arrow-left"></i></a>
</div>


@if(session()->has('success'))
    <p class="bg-green-500 text-white m-3 p-1 text-center">{{session('success')}}</p>
@endif


<div class="flex justify-end m-8">
    <h3 class="text-[20px] font-bold">{{$application->Title_offer}}</h3>
</div>


<div class="border m-3 md:flex justify-center items-center p-2">
    <div class="mr-4">
        @if($application->gender == 'female')
            <img class="w-20 h-20 rounded-full" src="{{ asset('images/fille.png')}}" alt="">
        @elseif($application->gender == 'Man')
             <img class="w-20 h-20 rounded-full" src="{{ asset('images/homme.png')}}" alt="">
        @endif
    </div>
    <div>
        <h3 class="font-bold text-[20px]">{{ $application->name}}</h3>
        <p class="capitalize">{{$application->profile_title}}</p>
    </div>
</div>



<div class="border m-3 ">
    <div class="m-2 text-start md:text-center">
        <h3 class="font-bold text-[20px]">Informations</h3>
    </div>

    <div class="m-3">
        <div class="">
            <div class="flex justify-between">
                <span class="py-2 font-bold"> <i class="fa-solid fa-envelope mx-1"></i> Email</span> 
                <span class="ml-20 text-blue-500">{{ $application->email}}</span>
            </div>

            <div  class="flex justify-between">
                <span class="py-2 font-bold"> <i class="fa-solid fa-phone"></i> Phone</span> 
                <span class="ml-20 text-blue-500">{{ $application->phone}}</span>
            </div>

            <div class="flex justify-between ">
                <span class="py-2 font-bold"><i class="fa-solid fa-location-dot"></i> Location</span> 
                <span class="ml-20 text-blue-500">{{ $application->location}}</span>
            </div>
        </div>
    </div>

</div>

<div class="border m-3 flex justify-center items-center p-2">
        <div class="flex gap-3">
            <p class="mt-2 text-white my-3 ">
                <a class="bg-blue-500 p-1" href="{{ Storage::url($application->cv)}}" target='_blank' > <i class="fa-solid fa-file-pdf"></i>resume</a>
            </p>
            <p class="mt-2 text-white">
                <a class="bg-blue-500 p-1" href="{{ Storage::url($application->cover_letter)}}"> <i class="fa-solid fa-file-pdf"></i> Cover letter</a>
            </p>
        </div>
</div>

<div class="flex justify-center my-5 gap-10">
    <form action="{{ route('change.status',$application->offer_id)}}" method="POST">
        @csrf
        @method('PUT')
        <button class='bg-red-500 text-white p-1 my-2' type="submit">Reject </button>
    </form>

    <form action="">
        <button class='bg-green-500 text-white p-1 my-2' type="submit">Contact the seeker</button>
    </form>
</div>

@endsection