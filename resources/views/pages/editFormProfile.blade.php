@extends('layout.layout')

@section('title','edition-profile')

@section('content')

@include('components.header')

<div class="flex justify-center items-center">
    <p>Profile edition</p>
</div>

<div>
    <form action="{{ route('post.profile.edit')}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for='name'>name</label>
            <input type="text" name='name' value="{{$user->name}}">
            @error('name')
                <p>{{$message}}</p>
            @enderror
        </div>
        
        <div>
            <label for='phone_number'>Phone number</label>
            <input type="text" name='phone_number' value="{{$user->phone_number}}">
            @error('phone_number')
            <p>{{$message}}</p>
            @enderror
        </div>
       
        <div>
            <label for='email'>email</label>
            <input class="pointer-events-none" type="email" name='email' value="{{$user->email}}" readonly>
        </div>

        <div>
            <input type="submit" value='save'>
        </div>

    </form>
</div>

@endsection