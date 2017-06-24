@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bathroom Locations</div>

                @foreach ($locations as $location)
                    <div class="panel-body">
                        <ul>
                            <li><a href="locations/{{$location->id}}">{{ $location->name }}</a></li>
                            <li><img src="/storage/business_profiles/{{ $location->photos[0]->name }}" style="max-width: 100px;"></li>
                            <li>{{ $location->description }}</li>
                            <li>{{ $location->category }}</li>
                            <li>{{ $location->address1 }}</li>
                            <li>{{ $location->address2 }}</li>
                            <li>{{ $location->city }}</li>
                            <li>{{ $location->state }}</li>
                            <li>{{ $location->zip }}</li>
                        </ul>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
