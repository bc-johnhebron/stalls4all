var app = angular.module('stalls4all', ['dataService','mainCtrl']);


var ctrl = angular.module('mainCtrl', []);

ctrl.controller('mainController', ['$scope', 'dataService', function($scope, dataService){
  // object to hold all the data for the new comment form
    $scope.locations = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // get all the comments first and bind it to the $scope.comments object
    // use the function we created in our service
    // GET ALL COMMENTS ==============
    Locations.getAll()
        .success(function(data) {
            $scope.locations = data;
            $scope.loading = false;
        });
}]);

var data = angular.module('dataService', []);

data.factory('Locations', function($http) {

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
        getReviews : function(locID,reviewID) {
          return $http.get('/api/locations'+locID+'/reviews/'+reviewID);
        }
    }

});
