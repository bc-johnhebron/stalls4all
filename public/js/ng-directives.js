var dir = angular.module('s4aDirectives', []);

dir.directive('starRating', function() {
  return {
    restrict: 'E',
    scope: {
      numStars: '=rating'
    },
    templateUrl: 'ng-views/star-rating.html'
  };
});

dir.directive('reviews', function() {
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
    },
    templateUrl: 'ng-views/reviews.html'
  };
});
