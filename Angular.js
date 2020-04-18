var rootApp = angular.module('rootApp', ['tableApp', 'routingApp', "deleteApp"])

var app = angular
        .module("tableApp", [])
        .controller('personenCtrl', function($scope, $http) {
          $http.get("Select.php").then(function (response) {
            $scope.personen = response.data.records;
          });

          $scope.sortColumn = "name"
          $scope.reverseSort = false;

          $scope.sortData = function(column) {
            $scope.reverseSort = ($scope.sortColumn == column) ? !$scope.reverseSort : false;
            $scope.sortColumn = column;
          }

          $scope.getSortClass = function(column) {

            if ($scope.sortColumn == column) {
              return $scope.reverseSort ? 'arrow-up' : 'arrow-down';
            }
            return '';
          }
        });
//tabel - data en sorteren van tabel

var routingApp = angular.module("routingApp", ["ngRoute"]);
routingApp.config(function($routeProvider) {
    $routeProvider
    .when("/update", {
        templateUrl : "./includes/update.htm"
    })
    .when("/insert", {
        templateUrl : "./includes/insert.htm"
    })
    .when("/delete", {
        templateUrl : "./includes/delete.htm"
    });
  });
// routing van de verschillende pagina's

var deleteApp = angular.module('deleteApp', []);
  app.controller('deleteCtrl', function($scope, $http) {
    $scope.deletePerson = function (id) {
      var url = 'Delete.php';
      var data = { 'id' : id};
      var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

      if(confirm("Weet je zeker dat je de record met het id : " + id + " wilt verwijderen?")){
        $http.post(url, data, config)
        .then(
          function(response){
         window.alert("success!, record was deleted");
         location.reload();
        },
        function(response){
         window.alert("failure, record has not been deleted");
        }
      );
    }
  }
});

// verwijderd de gegevens uit de database zodra er een ID wordt meegegeven
