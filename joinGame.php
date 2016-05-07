<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

session_start();

if (isset($_SESSION['username']) && isset($_GET['gameid'])) {
  $user = $_SESSION['username'];
  $gameid = $_REQUEST['gameid'];
  $db = new Connection();
  $link = $db->connectDatabase();
  $query = "INSERT INTO UserGame VALUES('".$user."', '".$gameid."')";
  $result = mysqli_query($link, $query);
  $db->closeConnection();
  header('location: index.php');
}
