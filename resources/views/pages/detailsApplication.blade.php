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

<div class="text-center font-bold text-[20px]">
    <h3>Application details</h3>
</div>

<div>
    <div class="flex justify-center items-center my-5">
        <h3 class="text-[20px]">{{$application->Title_offer}}</h3>
    </div>

    <div class="md:flex justify-around m-3">

        <div class="">
            <p class="py-2">Candidate : {{ $application->name}}</p>
            <p class="py-2">Email : {{ $application->email}}</p>
            <p class="py-2">Phone : {{ $application->phone}}</p>
            <p class="py-2">Location : {{ $application->location}}</p>
        </div>

        <div class="flex gap-3 md:block">
            <p class="mt-2 text-white my-3 ">
                <a class="bg-blue-500 p-1" href="{{ Storage::url($application->cv)}}" target='_blank' >resume</a>
            </p>
            <p class="mt-2 text-white">
                <a class="bg-blue-500 p-1" href="{{ Storage::url($application->cover_letter)}}"> Cover letter</a>
            </p>
        </div>


        <div class="flex gap-3 md:block">
            <form action="{{ route('change.status', $application->offer_id)}}" method="POST">
                @csrf
                <button class='bg-red-500 text-white p-1 my-2' type="submit">Reject </button>
            </form>

            <form action="">
                <button class='bg-green-500 text-white p-1 my-2' type="submit">Contact the seeker</button>
            </form>
        </div>

    </div>

</div>

@endsection