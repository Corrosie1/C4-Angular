<?php

  include "../database/connection/connection.php";
  //
  $data = json_decode(file_get_contents("php://input"));
  //
  $voornaam = $data->voornaam;
  $achternaam = $data->achternaam;
  $straat = $data->straat;
  $huisnummer = $data->huisnummer;
  $postcode = $data->postcode;
  $woonplaats = $data->woonplaats;
  $telefoonNummer = $data->telefoonnummer;
  $id = $data->id;
  //
  $sql = "UPDATE $table SET Voornaam='$voornaam', Achternaam='$achternaam', Straat='$straat', Huisnummer='$huisnummer',
  Postcode='$postcode', Woonplaats='$woonplaats', Telefoonnummer='$telefoonNummer' WHERE ID='$id'";
  //
  if ($conn->query($sql) === TRUE) {
      echo "Record updated!";
  } else {
      return False;
  }

  $conn->close();

?>
