<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $db = new Connection();
  $link = $db->connectDatabase();




//  echo "<h2>Your Games</h2>";
  //$query = "SELECT * FROM UserGame";
  $query = "SELECT date, kickoff, location, g.user FROM Games g, UserGame u WHERE g.game_id = u.gameid AND u.user = '".$username."';";
  $result = mysqli_query($link, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo
    '<div class="gamesList">
      <p>Game starts at '.$row["kickoff"].' on '.$row["date"].' at location '.$row['location'].'; hosted by '.$row['user'].'</p>
    </div>';
  }

  $db->closeConnection();
}
