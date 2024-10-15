@extends('layout.layout')

@section('title','offers')

@section('content')

    <div>
        @foreach ($offers as $item)
            <div class="border rounded p-2 m-3">
                <h4 class="font-bold text-[20px] my-2">{{$item->Title_offer}} - (F/H) </h3>
                <p class="uppercase">{{$item->Company_name}}</p>
                <p>{{$item->Location}}</p>

                <div class="my-3">
                    <p class="bg-gray-200 inline-block p-1 rounded">{{$item->Salary_range}}</p>
                    @if($item->Employement_type_id == 1)
                        <p class="bg-gray-200 inline-block p-1 rounded">CDI</p>
                    @elseif($item->Employement_type_id == 2)
                        <p class="bg-gray-200 inline-block p-1 rounded">CDD</p>
                    @elseif($item->Employement_type_id == 3)
                        <p class="bg-gray-200 inline-block p-1 rounded">Alternance</p>
                    @else
                        
                    @endif
                </div>

                <a href="#">Candidature simplifiée</a>

                <p class="my-2">Announce published {{$item->published_at}}</p>

            </div>
            
        @endforeach
    </div>

@endsection