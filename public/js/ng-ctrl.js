var ctrl = angular.module('s4aControllers', []);

ctrl.controller('mainController', ['$scope','Locations','geolocation', function($scope, Locations, geolocation){
    $scope.data = {};
    $scope.userLoc = false;
    // loading variable to show the spinning loading icon
    $scope.loading = 'Getting your location…';
    geolocation.getLocation()
      .then(function(data){
        var coords = {lat:data.coords.latitude, lng:data.coords.longitude};
        $scope.loading = 'Searching for nearby bathrooms…';
        $scope.userLoc = coords;
        // GET ALL LOCATIONS ==============
        Locations.getNearby(coords.lat, coords.lng)
          .then(function(response) {
            console.log(response.data);
            $scope.data = response.data.businesses;
            $scope.loading = false;
          }, function(error){
            $scope.loading = 'Oh, poop! We can\'t find anything, check back later';
          });
      }, function(err) {
        $scope.loading = 'Couldn\'t find location. Searching all bathrooms…';
        Locations.getAll().then(
          function(response) {
            console.log(response.data);
            $scope.data = response.data.businesses;
            $scope.loading = false;
          },
          function(error){
            $scope.loading = 'Oh, poop! We\'re having issues… check back later';
          }
        );
      });


    /*dataService.getFormattedData()
      .success(function(data) {
        $scope.data = data;
        $scope.loading = false;
      });
      */

    $scope.getUserLoc = function(){
      // TODO: Get user location with geolocation service
      //$scope.userLoc = !$scope.userLoc;
      console.log('get location');
    }
}]);

ctrl.controller('reviewController', ['$scope', function($scope){
  $scope.getAverageStars = function(reviewObject){
    var num = 4;
    console.log(reviewObject);
    return num;
  }
  $scope.familyFriendly = function(reviewObject){
    
  }
}])
