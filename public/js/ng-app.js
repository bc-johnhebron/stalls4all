var app = angular.module('stalls4all', ['s4aControllers', 's4aDataService', 's4aDirectives', 's4aServices', 'geolocation'], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<#');
  $interpolateProvider.endSymbol('#>');
});

app.filter('range', function() {
  return function(val, range) {
    range = parseInt(range);
    for (var i=0; i<range; i++)
      val.push(i);
    return val;
  };
});

app.filter('meterToFeet', function() {
  return function(input) {
    return input * 0.000621371;
  };
});

app.filter('unisexFilter', function() {
  return function(input, bool) {
    var out = [];
    if(bool == false){
      return input;
    } else {
      angular.forEach(input, function(item){
        if(item.bathroom_review.unisex == true) {
          out.push(item);
        }
      })
    }
    return out; 
  }
})
