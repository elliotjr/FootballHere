<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

session_start();

$data = json_decode($_GET['gameArray']);
$user = $_SESSION['username'];
$gameid = $data->result[0]->gameid;


//todo - IMPLEMENT THIS METHOD PLZ
function checkIfAttending($user, $gameid, $arrayOfAttendingGames) {
}


if (isset($_SESSION['username'])) {
  $db = new Connection();
  $link = $db->connectDatabase();
  $query = "INSERT INTO UserGame VALUES('".$user."', '".$gameid."')";
  $result = mysqli_query($link, $query);
  $db->closeConnection();
}
