var app = angular.module('stalls4all', ['mainCtrl', 'locationsService'], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<#');
  $interpolateProvider.endSymbol('#>');
});

var ctrl = angular.module('mainCtrl', []);
ctrl.controller('mainController', ['$scope','Locations', function($scope, Locations){
    $scope.data = {};
    $scope.userLoc = false;
    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // GET ALL LOCATIONS ==============
    Locations.getAll()
      .success(function(data) {
        $scope.data = data;
        $scope.loading = false;
      });

    $scope.getUserLoc = function(){
      // TODO: Get user location with geolocation service
      $scope.userLoc = !$scope.userLoc;
    }

}]);

var data = angular.module('locationsService', []);
data.factory('Locations', function($http) {
    console.log('Locations factory');
    return {
        // get all the comments
        getAll : function() {
            return $http.get('/api/locations');
        },
        getSingle : function(id) {
          return $http.get('/api/locations/'+id);
        },
        getSinglePhotos : function(id) {
          return $http.get('/api/locations/'+id+'/photos');
        },
        getReviews : function(locID) {
          return $http.get('/api/locations/'+locID+'/reviews/');
        },
        getReview : function(locID,reviewID) {
          return $http.get('/api/locations/'+locID+'/reviews/'+reviewID);
        }
    }
});

app.directive('starRating', function() {
  return {
    restrict: 'E',
    scope: {
      numStars: '=rating'
    },
    templateUrl: 'ng-views/star-rating.html'
  };
});

app.directive('reviews', function() {
  return {
    restrict: 'E',
    scope: {
      locID: '=locID'
    },
    controller: function ($scope,Locations) {
      $scope.reviews;
      Locations.getReviews(4)
        .success(function(data) {
          $scope.reviews = data;
        });

      $scope.getReviews = function () {
          //Call external scope's function
          var name = 'New Customer Added by Directive';
          $scope.add();

          //Add new customer to directive scope
          $scope.customers.push({
              name: name
          });
      };
    },
    templateUrl: 'ng-views/reviews.html'
  };
});

app.filter('range', function() {
  return function(val, range) {
    range = parseInt(range);
    for (var i=0; i<range; i++)
      val.push(i);
    return val;
  };
});
