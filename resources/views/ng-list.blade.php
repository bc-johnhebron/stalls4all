@extends('layouts.ng')

@section('content')
<section ng-controller="mainController">
  <div ng-show="loading">
    <h3 class="text-center padtop-5" ><# loading #></h3>
    <img class="align-center" src="/images/loading.gif" alt="loading" />
  </div>

  <div ng-hide="loading" class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h1>Restrooms Near You</h1>
            <button ng-hide="userLoc" class="btn btn-info" ng-click="getUserLoc()">Get my location</button>
          </div>
          <div ng-repeat="loc in data | orderBy:'distance'" class="col-sm-12 col-md-6 col-lg-4">
            <div class="bathroom_block">
              <div class="pull-right">
                <star-rating rating="loc.rating"></star-rating>
              </div>
              <p>
                <strong><# loc.name #></strong><br/>
                <# loc.location.address1 #> <# loc.location.address2 #><br/>
                <# loc.location.city #>, <# loc.location.state #> <# loc.location.zip_code #><br/>
                <# loc.display_phone #><br/>
                <span ng-if="userLoc"><# loc.distance | meterToFeet | number:2 #> mi away</span>
              </p>
              <div ng-controller="reviewController" class="feature-icons">
                <span ng-class="familyFriendly()" class="feature-icon baby"></span>
                <span class="feature-icon wheelchair"></span>
                <span class="feature-icon single-stall"></span>
                <span class="feature-icon unisex"></span>
              </div>
            <!--
            <pre>
              <# loc #>
            </pre>
            <reviews loc-id="<# loc.id #>"></reviews>
            -->
          </div>
      </div>
  </div>
</section>
@endsection
