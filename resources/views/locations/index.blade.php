@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="text-center">Know Where To Go</h1>
          <div class="bathroom_block text-center">
            <h3>Filters go here</h3>
          </div>
          @forelse ($locations as $location)
            <div class="bathroom_block {{ $location->category }}">
              <h3><a href="locations/{{$location->id}}">{{ $location->name }}</a>
                <span class="pull-right">
                  @component('component.rating', ['score' => 3])
                  @endcomponent
                </span>
              </h3>
              <p>
                {{ $location->address1 }} {{ $location->address2 }}<br/>
                {{ $location->city }}, {{ $location->state }} {{ $location->zip }}
              </p>
              <!--
              <pre>
                {{ $location }}
              </pre>
              -->
            </div>

          @empty
            <div class="panel-body text-center">
              <h3>Oh 💩, no results!</h3>
              <p><em><a href="{{ route('locations.create') }}">Add a restroom</a></em></p>
            </div>
          @endforelse

            <div class="panel panel-default">
                <div class="panel-heading">Bathroom Locations</div>

                @forelse ($locations as $location)

                <div class="panel-body">
                    <ul>
                        <li><a href="locations/{{$location->id}}">{{ $location->name }}</a>
                          <span class="pull-right">
                            @component('component.rating', ['score' => 3])
                            @endcomponent
                          </span>
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
