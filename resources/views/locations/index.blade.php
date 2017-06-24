@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bathroom Locations</div>

                @forelse ($locations as $location)

                <div class="panel-body">
                    <ul>
                        <li><a href="locations/{{$location->id}}">{{ $location->name }}</a></li>
                        <li>
                          @component('component.rating', ['score' => 3])
                          @endcomponent
                        </li>
                        <li>{{ $location->description }}</li>
                        <li>{{ $location->category }}</li>
                        <li>{{ $location->address1 }}</li>
                        <li>{{ $location->address2 }}</li>
                        <li>{{ $location->city }}</li>
                        <li>{{ $location->state }}</li>
                        <li>{{ $location->zip }}</li>
                    </ul>
                </div>

                @empty
                  <div class="panel-body text-center">
                    <h3>Oh 💩, no results!</h3>
                    <p><em><a href="{{ route('locations.create') }}">Add a restroom</a></em></p>
                  </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
