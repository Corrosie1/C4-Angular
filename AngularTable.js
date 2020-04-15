var app = angular
        .module("tableApp", [])
        .controller('personenCtrl', function($scope, $http) {
          $http.get("selectTable.php").then(function (response) {
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
