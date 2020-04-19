<?php

  include "../database/connection/connection.php";
  //
  $data = json_decode(file_get_contents("php://input"));
  $sql = "DELETE FROM $table WHERE ID = $data->id";
  //
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
?>
