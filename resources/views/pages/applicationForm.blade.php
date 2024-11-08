@extends('layout.layout')

@section('title','application')

@section('content')

@include('components.header')


<div class="flex justify-center items-center mt-6 uppercase">
   <p>Application </p> 
</div>

<div class="my-3 text-center">
    <p>Offer: <span class="font-bold">{{$offer->Title_offer}}</span></p>
    <p>Company: <span class="font-bold">{{$offer->Company_name}}</span></p>
</div>

<div class="p-2 md:flex">
    <form action="{{route('application.post')}}" class="border max-w-lg mx-auto p-2" method="POST" enctype="multipart/form-data">
      @csrf

        <div class="font-bold my-2">
            <h4>My informations</h4>
        </div>

        <div class="md:flex gap-4">
            <div>
                <label class="block" for="name">name <span class="text-red-500">*</span></label>
                <input class="my-2 w-full p-1 border focus:outline-none focus:border-blue-600" type="text" name="name" value="{{$user->name}}">
                @error('name')
                  <p class="my-1 text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label class="block" for="email">Email</label>
                <input class="my-2 w-full p-1 border pointer-events-none bg-gray-300" type="email" name="email" value="{{$user->email}}" readonly>
            </div>
        </div>
        
        <div class="md:flex gap-4 mb-5">
            <div>
                <label class="block" for="phone_number">Phone <span class="text-red-500">*</span></label>
                <input class='my-2 w-full p-1 border focus:outline-none focus:border-blue-600' type="text" name="phone" value="{{$user->phone_number}}">
                @error('phone')
                    <p class="my-1 text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label class="block" for="location">location</label>
                <input  class='my-2 w-full p-1 border focus:outline-none focus:border-blue-600' type="text" name="location" value="" placeholder="Lyon">
            </div>
        </div>

        <hr>

        <div class="font-bold my-3">
            <h4>My parcours</h4>
        </div>

        <div>
            <label class="block" for="profile_title">Profile title <span class="text-red-500">*</span></label>
            <input class="w-full my-2 border border-gray-300 focus:outline-none focus:border-blue-600 p-1" type="text" name="profile_title">
            @error('profile_title')
                <p class="my-1 text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="my-2">
            <label class="block" for="cv">CV <span class="text-red-500">*</span></label>
            <input class="w-full my-2 border border-gray-300" type="file" name="cv">
            @error('resume')
                <p class="my-1 text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="block" for="cover_letter">Cover letter</label>
            <input class="w-full my-2 border border-gray-300" type="file" name="cover_letter">
        </div>

       <div class="my-2">
            <label class="block" for="">Message</label>
            <textarea class=" my-2 w-full border border-gray-300 focus:outline-none focus:border-blue-600" name="" id="" cols="20" rows="5"></textarea>
       </div>

       <hr>


        <div class="font-bold my-3">
            <h4>Networks</h4>
        </div>

        <div class="my-2">
            <label class="block" for="website"> website</label>
            <input class="w-full my-2 p-1 border border-gray-300 focus:outline-none focus:border-blue-600" type="url" name="website" placeholder="http://www.example.com">
        </div>

        <div class="my-2 mb-5">
            <label class="block" for="network"> LinkdIn</label>
            <input class="w-full my-2 p-1 border border-gray-300 focus:outline-none focus:border-blue-600" type="url" name="network" placeholder="https://www.Linkdin/pgf.com">
        </div>

        <hr>

        <div class="font-bold my-3">
            <h4>Terms of Service</h4>
        </div>

        <div class="mb-5">
            <input class="" type="checkbox" value="">hdhhdhdhdhd j'i  lu et ldkdbdd ddbdbdd</input> <br>
            <input class="" type="checkbox" value="">j'accepte mes donnees  soitent gtraitées par nom de lentreprse</input>
        </div>

        <hr>

        <div class="my-3">
            <button class=" bg-blue-950 p-2 text-white rounded" type='submit'>Apply</button>
        </div>


        <div>
            <input type='hidden' name='user_id' value='{{Auth::id()}}'>
        </div>
        <div>
            <input type="hidden" name='offer_id' value='{{$offer->id}}'>
        </div>

        <div>
            <input type='text' name='recrutor_id' value='{{$offer->user_id}}'>
        </div>


    </form>
</div>

@endsection