var ctrl = angular.module('s4aControllers', []);

ctrl.controller('mainController', ['$scope','Locations','geolocation', function($scope, Locations, geolocation){
    $scope.data = {};
    $scope.userLoc = false;
    // loading variable to show the spinning loading icon
    $scope.loading = 'Getting your location…';

    // GET ALL LOCATIONS ==============
    Locations.getAll()
      .success(function(data) {
        $scope.data = data;
        $scope.loading = false;

      });

    /*dataService.getFormattedData()
      .success(function(data) {
        $scope.data = data;
        $scope.loading = false;
      });
      */
    geolocation.getLocation()
      .then(function(data){
        $scope.loading = 'Searching for nearby bathrooms…';
        $scope.userLoc = {lat:data.coords.latitude, lng:data.coords.longitude};

      });

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
}])
