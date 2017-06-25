@extends('layouts.ng')

@section('content')
<section ng-controller="mainController">
  <div ng-show="loading" class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
      <h3 class="text-center padtop-5" ><# loading #></h3>
      <img class="align-center" src="/images/loading.gif" alt="loading" />
    </div>
  </div>

  <div ng-hide="loading" class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h1>Restrooms Near You</h1>
        <button ng-hide="userLoc" class="btn btn-info" ng-click="getUserLoc()">Get my location</button>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6 text-center">
        <fieldset class="form-group form-inline order-buttons">
          <h4 class="main-label">Order By: </h4>
          <button class="btn" ng-class="{active:sortOrder=='distance'}" ng-click="updateOrdering('distance')">Closest to Me</button>
          <button class="btn" ng-class="{active:sortOrder=='-rating'}" ng-click="updateOrdering('-rating')">Best Rooms</button>
          <button class="btn" ng-class="{active:sortOrder=='rating'}" ng-click="updateOrdering('rating')">Worst Rooms</button><br/>
        </fieldset>
      </div>
      <div class="col-sm-12 col-md-6 text-center">
        <fieldset class="form-group form-inline">
          <h4 class="main-label">Filter By: </h4>
          <input type="checkbox" name="baby-station" id="baby-station" ng-model="filter.baby" /> <label for="baby-station">Baby Station</label>
          <input type="checkbox" name="wheelchair" id="wheelchair" ng-model="filter.wheelchair" /> <label for="wheelchair">Wheelchair Accessible</label><br/>
          <input type="checkbox" name="unisex" id="unisex" ng-model="filter.unisex" /> <label for="unisex">Unisex</label>
          <input type="checkbox" name="single-occ" id="single-occ" ng-model="filter.single" /> <label for="single-occ">Single Occupancy</label>
        </fieldset>
      </div>
    </div>
    <div class="row">
      <div ng-repeat="loc in data | orderBy:sortOrder" class="col-sm-12 col-md-6 col-lg-4">
        <div class="bathroom_block">
          <div class="pull-right">
            <star-rating rating="loc.rating"></star-rating>
          </div>
          <p>
            <strong><# loc.name #></strong><br/>
            <# loc.location.address1 #> <# loc.location.address2 #><br/>
            <# loc.location.city #>, <# loc.location.state #> <# loc.location.zip_code #><br/>
            <# loc.display_phone #>
          </p>
          <span class="blue-text martop-1" ng-if="userLoc"><# loc.distance | meterToFeet | number:2 #> mi away</span>

          <div ng-controller="reviewController" class="feature-icons">
            <span ng-class="familyFriendly()" class="feature-icon baby"></span>
            <span ng-class="{active:true}" class="feature-icon wheelchair"></span>
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
  </div>
</section>
@endsection
