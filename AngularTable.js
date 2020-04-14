var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("selectTable.php").then(function (response) {
    $scope.personen = response.data.records;
  });
});
