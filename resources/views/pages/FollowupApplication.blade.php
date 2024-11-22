@extends('layout.layout')

@section('title','Follow-up')

@section('content')

@include('components.header')

<div class="my-5 mx-2">
    <h3 class="font-bold text-[20px]">My jobs</h3>
</div>

<div>
    @if($applications && !$applications->isEmpty())
        @foreach($applications as $application)
        <hr class="m-2">
        
        {{-- <div class="absolute right-0 mx-2 my-2">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </div> --}}


        <div class="md:flex justify-between">
            <div class="m-2 relative">
                @if($application->status_id == 1)
                    <p class="bg-blue-600 inline-block p-1 my-1 rounded text-white">Application sent</p>
                @elseif($application->status_id == 2)
                    <p class="bg-red-500 inline-block p-1 my-1 rounded text-white">Application rejected</p>
                @endif

                <p class="font-bold underline">{{ $application->Title_offer}}- h/f</p>
                <p class="uppercase">{{ $application->Company_name}}</p>
                <p class="">{{ $application->location}}</p>

            </div>

            <div class="mx-5 my-1 text-center">
               <p class="border p-1 rounded-md text-blue-500 font-bold "> manage</p>
            </div>
        </div>
        <hr >
        @endforeach

    @else
   
    <div>
        <p> You have no applications to follow up</p>
    </div>

    @endif
</div>


@endsection


