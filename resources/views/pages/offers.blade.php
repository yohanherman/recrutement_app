@extends('layout.layout')

@section('title','offers')

@section('content')

@include('components.header')


    <div class="flex justify-center">
        <div class="">
            @foreach ($offers as $item)
                <div class="border-2 rounded p-2 m-3">
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

                    <a href="#"> simplified application</a>
                    <p class="my-2">Announce published {{$item->published_at}}</p>

                </div>
            @endforeach
            
        </div>

        
{{-- sidebar offer page --}}
        <div class="sidebar w-[50rem] h-screen hidden m-3 md:block ">

                <div class='content border-1'>
                    <div class="border shadow w-100 h-auto">
                        <div class="m-4">
                            <h4 class="font-bold text-[20px] py-1">{{$offerTopOfCollection->Title_offer}} - (F/H)</h4>
                            <p class="underline py-1">{{$offerTopOfCollection->Company_name}}</p>
                            <p class="py-1">{{$offerTopOfCollection->Location}}</p>
                            
                            
                            @if($offerTopOfCollection->Employement_type_id == 1)
                                <p class='bg-gray-200 inline-block p-1 rounded'>CDI</p>
                            @elseif($offerTopOfCollection->Employement_type_id == 2)
                                <p class='bg-gray-200 inline-block p-1 rounded '>CDD</p>
                            @elseif($offerTopOfCollection->Employement_type_id == 3)
                                <p class='bg-gray-200 inline-block p-1 rounded'>Alternance</p>
                            @else
                            @endif
                            
                        </div>

                        <div class='m-4'>
                            <a class="bg-blue-400 rounded p-2 text-white" href="">Apply now</a>
                       </div>
                    </div>

                    <div class="overflow-y-auto h-[calc(100vh-200px)] w-full border ">
                        <hr/>
                            <div>
                                <h4 class="font-bold m-4 text-[20px]">Job details</h4>
                            </div>

                            <div class="flex m-4">
                                <div><i class="fa-solid fa-briefcase mr-2"></i></div>
                                <div class='font-bold'>Type of position</div>
                            </div>

                            <div class="m-4">
                                @if($offerTopOfCollection->Employement_type_id == 1)
                                <p class='bg-gray-200 inline-block p-1 rounded'>CDI</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 2)
                                    <p class='bg-gray-200 inline-block p-1 rounded'>CDD</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 3)
                                    <p class='bg-gray-200 inline-block p-1 rounded'>Alternance</p>
                                @else
                                @endif
                            </div>

                            <div class=" flex m-4">
                                <div><i class="fa-solid fa-money-bill mr-2"></i></div>
                                <h4 class="font-bold">Salary</h4>
                            </div>
                            <div class="m-4">
                                <p class="bg-gray-200 inline-block p-1 rounded">{{$offerTopOfCollection->Salary_range}}</p>
                            </div>
                        <hr>
                            <div  class="m-4">
                                <h4 class="capitalize font-bold my-3">location</h4>
                                <div class="flex">
                                    <div><i class="fa-solid fa-location-crosshairs mr-2"></i></div>
                                    <p>{{$offerTopOfCollection->Location}}</p>
                                </div>
                            </div>
                        <hr>
                            <div class="m-4">
                                <h4 class="font-bold my-3">Position description</h4>
                                @if(!$offerTopOfCollection->description)
                                    <p>No description provided for the position</p>
                                @else
                                    <p>{{$offerTopOfCollection->description}}</p>
                                @endif
                            </div>
                            <div class="m-4">
                                <h5 class="font-bold my-3">Mission</h5>
                                @if(!$offerTopOfCollection->responsabilities->isEmpty())
                                    @foreach($offerTopOfCollection->responsabilities as $responsability)
                                    <p>- {{$responsability->responsabilities_text}}.</p>
                                    @endforeach
                                @else
                                    <p>No responsabilities provided</p>
                                @endif
                            </div>
                        <hr>
                            <div class="m-4">
                                <h5 class="font-bold my-3">requirements for the position</h5> 
                                @if(!$offerTopOfCollection->job_requirements->isEmpty())
                                    @foreach ($offerTopOfCollection->job_requirements as $job_requirement)
                                    <p>- {{$job_requirement->requirements}}</p>
                                    @endforeach
                                @else
                                    <p>No requirement provided</p>
                                @endif
                            </div>
                        <hr>
                            <div class="m-4">
                                <h5 class="font-bold my-3">Advantages</h5> 
                                {{-- @if(!$offerTopOfCollection->job_requirements->isEmpty())
                                    @foreach ($offerTopOfCollection->job_requirements as $job_requirement)
                                    <p>- {{$job_requirement->requirements}}</p>
                                    @endforeach
                                @else
                                    <p>No Advantage provided</p>
                                @endif --}}
                                <p>no Advantage provided</p>
                                <p>no Advantage provided</p>
                                <p>no Advantage provided</p>
                                <p>no Advantage provided</p>
                                <p>no Advantage provided</p>
                        
                            </div>
                        <hr>
                            <div class="flex justify-start items-center">
                                <div class="m-5 ">
                                    <a class='bg-gray-200 p-2 rounded' href=""><i class="fa-solid fa-flag"></i> Report this offera</a>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
  </div>

@endsection