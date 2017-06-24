@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $location->name }}</div>
                <div class="panel-body">
                    <ul>
                        <li><img src="/storage/business_profiles/{{ $location->photos[0]->name }}" style="max-width: 500px;"></li>
                        <li>{{ $location->description }}</li>
                        <li>{{ $location->category }}</li>
                        <li>{{ $location->address1 }}</li>
                        <li>{{ $location->address2 }}</li>
                        <li>{{ $location->city }}</li>
                        <li>{{ $location->state }}</li>
                        <li>{{ $location->zip }}</li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Leave a Review</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('locations.reviews.store', $location->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                            <label for="stars" class="col-md-4 control-label">Stars</label>

                            <div class="col-md-6">
                                <input id="stars" type="text" class="form-control" name="stars" value="{{ old('stars') }}" autofocus>

                                @if ($errors->has('stars'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stars') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sing_or_mult') ? ' has-error' : '' }}">
                            <label for="sing_or_mult" class="col-md-4 control-label">Single Person Or Stalls?</label>

                            <div class="col-md-6">
                                <input id="sing_or_mult" type="text" class="form-control" name="sing_or_mult" value="{{ old('sing_or_mult') }}">

                                @if ($errors->has('sing_or_mult'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sing_or_mult') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cleanliness') ? ' has-error' : '' }}">
                            <label for="cleanliness" class="col-md-4 control-label">Cleanliness</label>

                            <div class="col-md-6">
                                <input id="cleanliness" type="text" class="form-control" name="cleanliness" value="{{ old('cleanliness') }}">

                                @if ($errors->has('cleanliness'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cleanliness') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('changing_station') ? ' has-error' : '' }}">
                            <label for="changing_station" class="col-md-4 control-label">Changing Station</label>

                            <div class="col-md-6">
                                <input id="changing_station" type="text" class="form-control" name="changing_station" value="{{ old('changing_station') }}">

                                @if ($errors->has('changing_station'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('changing_station') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unisex') ? ' has-error' : '' }}">
                            <label for="unisex" class="col-md-4 control-label">Unisex</label>

                            <div class="col-md-6">
                                <input id="unisex" type="text" class="form-control" name="unisex" value="{{ old('unisex') }}">

                                @if ($errors->has('unisex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unisex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('doors') ? ' has-error' : '' }}">
                            <label for="doors" class="col-md-4 control-label">Doors</label>

                            <div class="col-md-6">
                                <input id="doors" type="text" class="form-control" name="doors" value="{{ old('doors') }}">

                                @if ($errors->has('doors'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doors') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('locks') ? ' has-error' : '' }}">
                            <label for="locks" class="col-md-4 control-label">Locks</label>

                            <div class="col-md-6">
                                <input id="locks" type="text" class="form-control" name="locks" value="{{ old('locks') }}">

                                @if ($errors->has('locks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('locks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('feel_safe') ? ' has-error' : '' }}">
                            <label for="feel_safe" class="col-md-4 control-label">Feel Safe</label>

                            <div class="col-md-6">
                                <input id="feel_safe" type="text" class="form-control" name="feel_safe" value="{{ old('feel_safe') }}">

                                @if ($errors->has('feel_safe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feel_safe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('wifi') ? ' has-error' : '' }}">
                            <label for="wifi" class="col-md-4 control-label">Wifi</label>

                            <div class="col-md-6">
                                <input id="wifi" type="text" class="form-control" name="wifi" value="{{ old('wifi') }}">

                                @if ($errors->has('wifi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wifi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('customer_only') ? ' has-error' : '' }}">
                            <label for="customer_only" class="col-md-4 control-label">Customers Only</label>

                            <div class="col-md-6">
                                <input id="customer_only" type="text" class="form-control" name="customer_only" value="{{ old('customer_only') }}">

                                @if ($errors->has('customer_only'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_only') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('wheelchair_accessible') ? ' has-error' : '' }}">
                            <label for="wheelchair_accessible" class="col-md-4 control-label">Wheelchair Accessible</label>

                            <div class="col-md-6">
                                <input id="wheelchair_accessible" type="text" class="form-control" name="wheelchair_accessible" value="{{ old('wheelchair_accessible') }}">

                                @if ($errors->has('wheelchair_accessible'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wheelchair_accessible') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-4 control-label">Comment</label>

                            <div class="col-md-6">
                                <input id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}">

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Reviews</div>
                @foreach ($location->reviews as $review)
                <div class="panel-body">
                    <ul>
                        <li>{{ $review->stars }}</li>
                        <li>{{ $review->sing_or_mult }}</li>
                        <li>{{ $review->cleanliness }}</li>
                        <li>{{ $review->changing_station }}</li>
                        <li>{{ $review->unisex }}</li>
                        <li>{{ $review->doors }}</li>
                        <li>{{ $review->locks }}</li>
                        <li>{{ $review->feel_safe }}</li>
                        <li>{{ $review->wifi }}</li>
                        <li>{{ $review->customer_only }}</li>
                        <li>{{ $review->wheelchair_accessible }}</li>
                        <li>{{ $review->comment }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
