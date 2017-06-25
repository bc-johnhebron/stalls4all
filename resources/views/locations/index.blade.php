@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

             <div>
                <form class="form-horizontal" role="form" method="GET">
                    <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                        <label for="zip" class="col-md-4 control-label">Zip/Postal Code:</label>

                        <div class="col-md-6">
                            <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" autofocus>

                            @if ($errors->has('zip'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zip') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        
            <div class="panel panel-default">
                <div class="panel-heading">Bathroom Locations</div>

                @foreach ($locations as $location)
                    <div class="panel-body">
                        <ul>
                            <li><a href="/locations/{{$location->id}}">{{ $location->name }}</a></li>
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
