@extends('layout.layout')

@section('title','applications')

@section('content')
@include('components.header')


<div>
    <div class="my-5 mx-2">
        <p>Recrutor: {{ Auth::user()->name}}</p>
    </div>


    @if($applications && !$applications->isEmpty())

      <table class="">
          <caption class="my-5 text-[20px] font-bold">
            Applications
          </caption>
          <thead>
            <tr>
              <th scope="col">Offer Title</th>
              <th scope="col">seeker position</th>
              <th scope="col">seeker name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">user Location</th>
              <th scope="col">Message</th>
              <th scope="col">Resume</th>
              <th scope="col">Cover letter</th>
              <th scope="col">applied date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          @foreach($applications as $application)
          <tbody>            
            <tr>
              <td>{{$application->Title_offer}}</td>
              <td>{{$application->profile_title}}</td>
              <td>{{$application->name}}</td>
              <td>{{$application->email}}</td>
              <td>{{$application->phone}}</td>
              <td>{{$application->location}}</td>
              @if($application->message)
                  <td>
                      {{Str::limit($application->message, 25)}}
                      <button class="btn-modal">Read more</button>
                  </td>
              @else
                  <td>No message</td>
              @endif
              <td><a class='bg-blue-700 p-1 rounded text-white' href="{{Storage::url($application->cv)}}" target="_blank">Resume</a></td>
              
              @if($application->cover_letter)
                  <td><a class='bg-blue-700 p-1 rounded text-white' href="{{Storage::url($application->cover_letter)}}" target='_blank'>cover letter</a></td>
              @else
                  <td>No letter provided</td>
              @endif

              <td>{{$application->created_at}}</td>

              @if($application->status_id == 1)
                  <td class="bg-blue-700 p-1 rounded text-white">PENDING</td>
              @elseif($application->status_id ==2)
                  <td class="bg-red-500 rounded">REJECTED</td>
              @endif
              {{-- <td>pending</td> --}}
              <td>
                  <a class=' bg-blue-700 text-white p-1 rounded' href="{{route('application.details',$application->offer_id)}}">See</a>
              </td>
              
            </tr>  
          </tbody>

          <div class="">
              <div class="fixed top-24 left-60 bg-gray-500 hidden p-3 overflow-auto text-justify w-[40%] h-[30%] z-10 text-white modalWindow">
                  <p>{{$application->message}}</p>
              </div>
            </div>
          @endforeach

    
      </table>
    @else

    <p class="text-center m-5">No application Received</p>

    @endif
</div>

@endsection

@push('scripts')
  <script src='{{ asset('javascript/application.js')}}'></script>
@endpush