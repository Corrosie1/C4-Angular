<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./CSS/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <script src="Javascript/root.js"></script>
    <script src="AngularTable.js" type="text/javascript"></script>
    <script src="Javascript/AngularRouting.js" type="text/javascript"></script>
  </head>
  <body ng-app="rootApp">
    <div class="parent">
      <div class="borderUnder-child-x1">
        <h1 class="Mainheader"> C4 Angular eindopdracht - Michel Disbergen </h1>
        <div class="uitleg-child-x2">
          <h2> Filteren </h2>
          <p>door op woonplaats of achternaam van de table headers te klikken wordt het mogelijk gemaakt om <br>
          ascending of descdending te filteren/sorteren </p>
          <h2> CRUD systeem </h2>
          <p> onderin het scherm heb je meerdere links.<br>
          Door op 1 van deze links te klikken wordt wordt er gebruik gemaakt van routing. <br>
          Hiermee wordt het juiste scherm opgehaald</p>
          </div>
        <div class="tabel-child-x2" id="tableApp" ng-controller="personenCtrl">
          <h2> Overzicht gegevens </h2>
          <p> Aan de onderkant is een tabel te zien, deze tabel is een overzicht <br>
          van alle gegevens die beschikbaar zijn in de database 'eindopdracht_angular'</p>
          <table align=center>
            <tr>
              <th> ID </th>
              <th> Voornaam </th>
              <th ng-click="sortData('Achternaam')"> Achternaam <div ng-class="getSortClass('Achternaam')"></div></th>
              <th> Straat </th>
              <th> Huisnummer </th>
              <th> Postcode </th>
              <th ng-click="sortData('Woonplaats')"> Woonplaats <div ng-class="getSortClass('Woonplaats')"></div> </th>
              <th> Telefoon nummer </th>
              <th> Tijdtoegevoegd </th>
            </tr>
            <tr ng-repeat="persoon in personen | orderBy:sortColumn:reverseSort">
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
      <div class="routing-child-x2" id="routingApp">
        <div class="routingLinks-child-x3">
          <ul>
            <li class="link"><button type="button"><a href="#!delete">delete</a></button></li>
            <li class="link"><button type="button"><a href="#!insert">Insert</a></button></li>
            <li class="link"><button type="button"><a href="#!update">Update</a></button></li>
          </ul>
        </div>
        <div class="routingOutput-child-x3">
          <div ng-view>
            <!-- content from the different .php files will be shown here -->
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
