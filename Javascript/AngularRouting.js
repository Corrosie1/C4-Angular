var routingApp = angular.module("routingApp", ["ngRoute"]);
routingApp.config(function($routeProvider) {
    $routeProvider
    .when("/update", {
        templateUrl : "./php/includes/CRUD/update.php"
    })
    .when("/insert", {
        templateUrl : "./php/includes/CRUD/insert.php"
    })
    .when("/delete", {
        templateUrl : "./php/includes/CRUD/delete.php"
    });
  });
