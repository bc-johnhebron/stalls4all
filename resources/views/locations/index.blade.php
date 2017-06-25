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

                @foreach ($locations['businesses'] as $location)

                    <div class="panel-body">
                        <ul>
                            <li><a href="/locations/{{$location['id']}}">{{ $location['name'] }}</a></li>
                            <li><img src="{{ $location['image_url'] }}" style="max-width: 100px;"></li>
                            <li>Categories:
                                <ul>
                                    @foreach ($location['categories'] as $category)
                                    <li>{{ $category['title'] }}</li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li>
                                Location:
                                <ul>
                                    <li>{{ $location['location']['address1'] }}</li>
                                    <li>{{ $location['location']['address2'] }}</li>
                                    <li>{{ $location['location']['city'] }} {{ $location['location']['state'] }}, {{ $location['location']['zip_code'] }}</li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
