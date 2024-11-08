@extends('layout.layout')

@section('title','offers')

@section('content')

@include('components.header')

@include('components.searchbar')

<br>

<br>


@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


    <div class="flex justify-center">
        @if(!$offers->isEmpty())
        <div class="">
            @foreach ($offers as $item)
                <div class="border-2 rounded p-2 m-3 offers" data-offer-id='{{$item->id}}'>
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

                    <a href="#">{{__('pageOffer.Simplified application')}}</a>
                    <p class="my-2"> {{__('pageOffer.Announce published')}} {{$item->published_at}}</p>
                </div>
            @endforeach
            
        </div>
        
{{-- sidebar offer page --}}

        <div class="sidebar w-[50rem] h-screen hidden m-3 md:block ">

                <div class='content border-1'>
                    <div class="border shadow w-100 h-auto">
                        <div class="m-4">
                                <h4 class="font-bold text-[20px] py-1 title_offer">{{$offerTopOfCollection->Title_offer}} - (F/H)</h4>
                                <p class="underline py-1 company_name">{{$offerTopOfCollection->Company_name}}</p>
                                <p class="py-1 location">{{$offerTopOfCollection->Location}}</p>
                                
                                
                                @if($offerTopOfCollection->Employement_type_id == 1)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>CDI</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 2)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>CDD</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 3)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>Alternance</p>
                                @else
                                @endif
                        </div>

                        @if(Auth::user()->role == 'job-seeker')
                            <div class='m-4'>
                                <a class=" bg-blue-950 rounded p-2 text-white id_offer" href="{{route('apply.now', $offerTopOfCollection->id)}}">{{__('pageOffer.Apply now')}}</a>
                            </div>
                        @elseif(Auth::user()->role == 'recrutor')
                            <div class='m-4'>
                                <a class=" bg-blue-950 rounded p-2 text-white id_offer apply-btn" href="#">{{__('pageOffer.Apply now')}}</a>
                            </div>
                       @endif

                    </div>

                    <div class="overflow-y-auto h-[calc(100vh-200px)] w-full border ">
                        <hr/>
                            <div>
                                <h4 class="font-bold m-4 text-[20px]">{{ __('pageOffer.job details')}}</h4>
                            </div>

                            <div class="flex m-4">
                                <div><i class="fa-solid fa-briefcase mr-2"></i></div>
                                <div class='font-bold'>{{__('pageOffer.Type of position')}}</div>
                            </div>

                            <div class="m-4">
                                @if($offerTopOfCollection->Employement_type_id == 1)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>CDI</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 2)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>CDD</p>
                                @elseif($offerTopOfCollection->Employement_type_id == 3)
                                    <p class='bg-gray-200 inline-block p-1 rounded contract'>Alternance</p>
                                @else
                                @endif
                            </div>

                            <div class=" flex m-4">
                                <div><i class="fa-solid fa-money-bill mr-2"></i></div>
                                <h4 class="font-bold">{{__('pageOffer.Salary')}}</h4>
                            </div>
                            <div class="m-4">
                                  <p class="bg-gray-200 inline-block p-1 rounded salary">{{$offerTopOfCollection->Salary_range}}</p>
                            </div>
                        <hr>
                            <div  class="m-4">
                                <h4 class="capitalize font-bold my-3">{{__('pageOffer.location')}}</h4>
                                <div class="flex">
                                    <div><i class="fa-solid fa-location-crosshairs mr-2"></i></div>
                                    <p class="location">{{$offerTopOfCollection->Location}}</p>
                                </div>
                            </div>
                        <hr>
                            <div class="m-4">
                                <h4 class="font-bold my-3">{{__('pageOffer.Position description')}}</h4>
                                @if(!$offerTopOfCollection->description)
                                    <p>{{__('pageOffer.No description provided for the position')}}</p>
                                @else
                                    <p class="description">{{$offerTopOfCollection->description}}</p>
                                @endif
                            </div>
                            <div class="m-4">
                                <h5 class="font-bold my-3">{{__('pageOffer.Mission')}}</h5>
                        
                                @if(!$offerTopOfCollection->responsabilities->isEmpty())
                                    @foreach($offerTopOfCollection->responsabilities as $responsability)
                                    <p>- {{$responsability->responsabilities_text}}.</p>
                                     @endforeach
                                @else
                                        <p>{{__('pageOffer.No responsabilities specified for the position')}}</p>
                                @endif
                            </div>
                        <hr>
                            <div class="m-4">
                                <h5 class="font-bold my-3">{{__('pageOffer.Requirements for the position')}}</h5> 
                                    @if(!$offerTopOfCollection->job_requirements->isEmpty())
                                      @foreach ($offerTopOfCollection->job_requirements as $job_requirement)
                                      <p>- {{$job_requirement->requirements}}</p>
                                      @endforeach
                                    @else
                                      <p>{{__('pageOffer.No requirement provided')}}</p>
                                    @endif
                            </div>
                        <hr>
                            <div class="m-4">
                                <h5 class="font-bold my-3">{{__('pageOffer.Advantages')}}</h5> 
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
        @else
            <div class="my-5">
                <p>no offer published on the site</p>
            </div>
        @endif
  </div>
@endsection