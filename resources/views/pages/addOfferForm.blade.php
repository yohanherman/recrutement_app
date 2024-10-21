@extends('layout.layout')

@section('title','add-an-offer')

@section('content')

{{-- @if(session()->has('success')){
    <p>{{session('success')}}</p>
}
@endif --}}

@if(session()->has('error')){
    <p>{{session('error')}}</p>
}
@endif

<div class="flex justify-center items-center font-bold text-[20px] my-10 capitalize">
    <h4>publishing offer form</h4>
</div>

<div>
    <form action='{{route('post.offers')}}' method='POST'>
        @csrf
        <div class='m-5'>
            <label class='block my-2' for='Title_offer'>Offer title</label>
            <input class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded" type='text' id='Title_offer'name='Title_offer'>
            @error('Title_offer')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-5">
            <label class='block my-2' for='Company_name'>Company name</label>
            <input class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded" type='text' id='Company_name'name='Company_name'>
            @error('Company_name')
                <p class="text-red-500">{{ $message }}</p>
             @enderror
        </div>
        <div class="m-5">
            <label class='block my-2' for='Location'>Location</label>
            <input class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded" type='text' id='Location'name='Location'>
            @error('Location')
                 <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-5">
            <label class='block my-2' for='Employement_type_id'>Contract type</label>
            <input class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded" type='number' id='Employement_type_id'name='Employement_type_id'>
            @error('Employement_type_id')
                 <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-5">
            <label class='block my-2' for='Salary_range'>Salary range</label>
            <input class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded" type='text' id='Salary_range'name='Salary_range'>
            @error('Salary_range')
                 <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            @if( Auth::check() && Auth::user()->role=='recrutor')
                <input type='hidden' id='user_id'name='user_id' value='{{Auth::id()}}'>
            @endif
        </div>
        <div class="m-5">
            <label class='block my-2' for='description'>Description</label>
            <textarea class="w-full md:w-[70%] border focus:outline-none focus:border-blue-400 rounded"  id='description'name='description' rows='5' cols='33'></textarea>
            @error('description')
                 <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-5">
            <input class="bg-blue-400 p-2 text-white rounded" type="submit" value="validate and add further info about the offer">
        </div>
    
    </form>
</div>
@endsection
