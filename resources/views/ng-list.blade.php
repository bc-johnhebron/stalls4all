@extends('layouts.ng')

@section('content')
<section ng-controller="mainController">
  <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin">LOADING</span></p>

  <div ng-hide="loading" class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>Angular!! </h1>
            <button class="btn btn-info" ng-click="getUserLoc()">Get my location</button>
            <div ng-show="userLoc"><# userLoc #></div>
          </div>
          <div ng-repeat="loc in data" class="col-sm-12 col-md-6 col-lg-4">
            <div class="bathroom_block">
              <div class="pull-right" ng-controller="reviewController">
                <!-- TODO: Pass in/calculate aggregate rating -->
                <star-rating rating="4"></star-rating>
              </div>
              <p>
                <strong><# loc.name #></strong><br/>
                <# loc.address1 #> <# loc.address2 #><br/>
                <# loc.city #>, <# loc.state #> <# loc.zip #><br/>
                <span ng-if="userLoc">.2 mi away</span>
              </p>
            <pre>
              <# loc #>
            </pre>
            <reviews loc-id="<# loc.id #>"></reviews>
          </div>
      </div>
  </div>
</section>
@endsection
