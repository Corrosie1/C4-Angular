<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./CSS/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="AngularTable.js" type="text/javascript"></script>
    <script src="Javascript/Angular.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="parent">
      <div class="table-child" ng-app="myApp" ng-controller="customersCtrl">
        <table>
          <tr>
            <th> ID </th>
            <th> Voornaam  </th>
            <th> Achternaam </th>
            <th> Straat </th>
            <th> Huisnummer </th>
            <th> Postcode </th>
            <th> Woonplaats </th>
            <th> Telefoon nummer </th>
            <th> Tijdtoegevoegd </th>
          </tr>
          <tr ng-repeat="persoon in personen">
            <td>{{ persoon.ID }}</td>
            <td>{{ persoon.Voornaam }}</td>
            <td>{{ persoon.Achternaam }}</td>
            <td>{{ persoon.Straat }}</td>
            <td>{{ persoon.Huisnummer }}</td>
            <td>{{ persoon.Postcode }}</td>
            <td>{{ persoon.Woonplaats }}</td>
            <td>{{ persoon.TelefoonNummer }}</td>
            <td>{{ persoon.Tijdtoegevoegd }}</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
