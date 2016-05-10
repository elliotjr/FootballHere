<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');
$db = new Connection();
$link = $db->connectDatabase();
$query = "SELECT * FROM Games";
$result = mysqli_query($link, $query);
$resultArray = [];
while ($row = mysqli_fetch_assoc($result)) {
  if (( (int) $row['players_needed']) > 0) {
    array_push($resultArray, $row);
  } else {
  }

}
$db->closeConnection();
//header( 'Content-Type: application/json' );
echo json_encode($resultArray);
