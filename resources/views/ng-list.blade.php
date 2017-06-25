@extends('layouts.ng')

@section('content')
<section ng-controller="mainController">
  <div ng-show="loading">
    <h3 class="text-center padtop-5" ><# loading #></h3>
    <img class="align-center" src="/images/loading.gif" alt="loading" />
  </div>

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
              <span class="feature-icon baby"></span>
              <span class="feature-icon wheelchair"></span>
              <span class="feature-icon single-stall"></span>
              <span class="feature-icon unisex"></span>
            <pre>
              <# loc #>
            </pre>
            <reviews loc-id="<# loc.id #>"></reviews>
          </div>
      </div>
  </div>
</section>
@endsection
