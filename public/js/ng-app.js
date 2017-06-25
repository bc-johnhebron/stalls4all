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

app.filter('babyFilter', function() {
  return function(input, bool) {
    var out = [];
    if(bool == false){
      return input;
    } else {
      angular.forEach(input, function(item){
        if(item.bathroom_reviews[0].changing_station == true) {
          out.push(item);
        }
      })
    }
    return out;
  }
});

app.filter('wheelchairFilter', function() {
  return function(input, bool) {
    var out = [];
    if(bool == false){
      return input;
    } else {
      angular.forEach(input, function(item){
        if(item.bathroom_reviews[0].wheelchair_accessible == true) {
          out.push(item);
        }
      })
    }
    return out;
  }
});

app.filter('unisexFilter', function() {
  return function(input, bool) {
    var out = [];
    if(bool == false){
      return input;
    } else {
      angular.forEach(input, function(item){
        if(item.bathroom_reviews[0].unisex == true) {
          out.push(item);
        }
      })
    }
    return out;
  }
});

app.filter('singleFilter', function() {
  return function(input, bool) {
    var out = [];
    if(bool == false){
      return input;
    } else {
      angular.forEach(input, function(item){
        if(item.bathroom_reviews[0].sing_or_mult == true) {
          out.push(item);
        }
      })
    }
    return out;
  }
});
