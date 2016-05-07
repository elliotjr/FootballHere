<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $db = new Connection();
  $link = $db->connectDatabase();
  $query = "SELECT * FROM Games WHERE user = '".$username."'";

  $result = mysqli_query($link, $query);

  echo "<h2>Games You Have Created</h2>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo
    '<div class="yourGames">
      <h2>'.$row["location"].': '.$row["date"].'</h2>
    </div>';

  }

  echo "<h2>Games You Are Attending</h2>";
  $query = "SELECT * FROM UserGame";
  $result = mysqli_query($link, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo
    '<div class="yourGames">
      <h2>'.$row["user"].': '.$row["gameid"].'</h2>
    </div>';
  }

  $db->closeConnection();
}
