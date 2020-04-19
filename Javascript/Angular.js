var rootApp = angular.module('rootApp', ['tableApp', 'routingApp', "deleteApp", "insertApp", "updateApp"])
//
var app = angular
        .module("tableApp", [])
        .controller('personenCtrl', function($scope, $http) {
          $http.get("php/CRUD/Select.php").then(function (response) {
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
      var url = 'php/CRUD/Delete.php';
      var data = { 'id' : id.toString()};
      var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

      if(confirm("Weet je zeker dat je het record met id : " + id + " wilt verwijderen?")){
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
// deleten van een record

var insertApp = angular.module('insertApp', []);
app.controller('insertCtrl', function($scope, $http){
  $scope.insertPerson = function(voornaam, achternaam, straat, huisnummer, postcode, woonplaats, telnr){
    var url = 'php/CRUD/Insert.php';
    var data = {
      'voornaam': voornaam.toString(),
      'achternaam': achternaam.toString(),
      'straat': straat.toString(),
      'huisnummer': huisnummer.toString(),
      'postcode': postcode.toString(),
      'woonplaats': woonplaats.toString(),
      'telefoonnummer': telnr.toString()
    }

    var config = {
              headers : {
                  'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
              }
          }

    if(confirm("Weet je zeker dat je de record toe wilt voegen?")){
      $http.post(url, data, config)
      .then(function(response){
             window.alert("success!, record is toegevoegd!");
             location.reload();
            },
            function(response){
             window.alert("failure, record is niet toegevoegd");
            }
          );
        }
      }
    })
// Insert de gegevens in de database

var updateApp = angular.module('updateApp', []);
app.controller('updateCtrl', function($scope, $http){
  $scope.updatePerson = function(voornaam, achternaam, straat, huisnummer, postcode, woonplaats, telnr, id){
    var url = 'php/CRUD/Update.php';
    var data = {
      'voornaam': voornaam.toString(),
      'achternaam': achternaam.toString(),
      'straat': straat.toString(),
      'huisnummer': huisnummer.toString(),
      'postcode': postcode.toString(),
      'woonplaats': woonplaats.toString(),
      'telefoonnummer': telnr.toString(),
      'id' : id.toString()
    }

    var config = {
              headers : {
                  'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
              }
          }

    if(confirm("Weet je zeker dat je het record met ID " + id + " Wilt updaten?")){
      $http.post(url, data, config)
      .then(function(response){
             window.alert("success!, record is geupdated!");
             location.reload();
            },
            function(response){
             window.alert("failure, record is niet geupdated.");
            }
          );
        }
      }
    })
// updaten van een record
