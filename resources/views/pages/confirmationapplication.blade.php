@extends('layout.layout')


@section('content')

<div class="m-5 text-[27px]">
    <a href="{{route('home.offers')}}">retour</a>
</div>

 <div class="text-center bg-red-500 w-60 text-white m-5 h-10 flex justify-center items-center" >
    <p>Application successfully sent to the recrutor</p>
</div>
@endsection