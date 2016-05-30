<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//include('connection.php');

/**
*Prints a list of games that satisify the skill requirement (Easy: 1, Amateure: 2, Hard: 3)
*/
function getGameBySkill($skill) {
  $db = new Connection();
  $link = $db->connectDatabase();
  $skill = mysqli_real_escape_string($link, $skill);
  $query = "SELECT * FROM Games WHERE difficulty ='".$skill."';";
  $result = mysqli_query($link, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['location'].", ".$row['date'];
  }
  $db->closeConnection();
}
