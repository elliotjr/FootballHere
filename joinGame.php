<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

session_start();

$data = json_decode($_GET['gameArray']);
$user = $_SESSION['username'];
$gameid = $data->result[0]->gameid;


//todo - IMPLEMENT THIS METHOD PLZ
function checkIfAttending() {
}

/**
*Returns true if there are any more spaces for a game. Else, return false. 
*/
function needsPlayers($link, $gameid) {
  $morePlayers = False;
  $query = "SELECT players_needed FROM Games WHERE game_id = ".$gameid.";";
  $result = mysqli_query($link, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    if (((int) $row['players_needed']) > 0) {
      $morePlayers = True;
    } else {
      $morePlayers = False;
    }
  }
  return $morePlayers;
}


if (isset($_SESSION['username'])) {
  $db = new Connection();
  $link = $db->connectDatabase();
  if (needsPlayers($link, $gameid)) {
    $query = "INSERT INTO UserGame VALUES('".$user."', '".$gameid."')";
    $result = mysqli_query($link, $query);
    //decrease number of players needed
    $query = "UPDATE Games SET players_needed = players_needed - 1 WHERE game_id = ".$gameid.";";
    $result = mysqli_query($link, $query);
    $db->closeConnection();
  }
}
