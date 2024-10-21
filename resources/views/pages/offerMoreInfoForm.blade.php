@extends('layout.layout')

@section('title','more-offer-details')

@section('content')

page d'info supplementaire sur les offres

<div>
    <form action="{{route('post.addMoreOfferDetails')}}" method="POST">
        @csrf
        <div class="m-5">
            <label class="block" for="Missions"> specify missions</label>
            <input class="border" type="text" name="responsabilities_text">
        </div>
        <div class="m-5">
            <input type="text" value="{{$offer->id}}" name='offer_id'>
        </div>
        {{-- <div class="m-5">
            <input class="border" type="text" value="{{$offer->user_id}}">
        </div> --}}
        <div class="m-5">
            <input class="bg-blue-500 text-white p-1 rounded" type='submit' value='save'>
        </div>
    </form>
</div>

@endsection