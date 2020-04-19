<?php

  include "./php/database/connection/connection.php";
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
  $timestamp = date('Y-m-d H:i:s');
  //
  $sql = "INSERT into $table (Voornaam, Achternaam, Straat, Huisnummer, Postcode, Woonplaats, Telefoonnummer, TijdToegevoegd)
  VALUES ('$voornaam', '$achternaam', '$straat', '$huisnummer', '$postcode', '$woonplaats', '$telefoonNummer', '$timestamp')";
  //
  if ($conn->query($sql) === TRUE) {
      echo "Record inserted!";
  } else {
      return False;
  }

  $conn->close();

?>
