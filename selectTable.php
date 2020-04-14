<?php
include "./php/database/connection/connection.php";
//
$result = $conn->query("SELECT ID, Voornaam, Achternaam, Straat, Huisnummer, Postcode, Woonplaats, TelefoonNummer, Tijdtoegevoegd FROM $table");
$outp = "";
//
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
if ($outp != "") {$outp .= ",";}
  $outp .= '{"ID":"' . $rs["ID"] . '",';
  $outp .= '"Voornaam":"' . $rs["Voornaam"] . '",';
  $outp .= '"Achternaam":"'. $rs["Achternaam"] . '",';
  $outp .= '"Straat":"'. $rs["Straat"] . '",';
  $outp .= '"Huisnummer":"'. $rs["Huisnummer"] . '",';
  $outp .= '"Postcode":"'. $rs["Postcode"] . '",';
  $outp .= '"Woonplaats":"'. $rs["Woonplaats"] . '",';
  $outp .= '"TelefoonNummer":"'. $rs["TelefoonNummer"] . '",';
  $outp .= '"Tijdtoegevoegd":"'. $rs["Tijdtoegevoegd"] . '"}';
}
//
$outp ='{"records":['.$outp.']}';
//
$conn->close();
echo($outp);

 ?>
