var data = angular.module('s4aDataService', []);

data.service('dataService', ['Locations', '$q', function(Locations, $q) {
  var _this = this;

  this.getFormattedData = function(){
    var deferred = $q.defer();
    var formatted = [];
    Locations.getAll().then(function(response) {
      console.log(response.data);
      deferred.resolve(5);
    }, function(response) {
      deferred.reject(response);
    });
    return deferred.promise;
  }
}]);
data.factory('Locations', function($http) {
    console.log('Locations factory');
    return {
        // get all the comments
        getAll : function() {
            return $http.get('/api/locations');
        },
        getNearby : function(lat,lon) {
          return $http.get('/api/locations?lat='+lat+'&lon='+lon);
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
