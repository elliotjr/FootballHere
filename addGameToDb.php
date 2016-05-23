<?php

include('connection.php');
include('geoCode.php');
error_reporting(E_ALL && ~E_NOTICE);
session_start();

//Check the user has submitted form
if(isset($_REQUEST)) {
  // get the Coordinates of location user has inputted
  $geoCodeJson = buildUrl($_REQUEST['state'], $_REQUEST['city'], $_REQUEST['suburb'], $_REQUEST['street'], $_REQUEST['number']);
  $coordinates = getLatLong($geoCodeJson);
  $lat = $coordinates[0];
  $lng = $coordinates[1];
  $db = new Connection();
  $link = $db->connectDatabase();
  $location = $_REQUEST['state'].", ".$_REQUEST['city'].", ".$_REQUEST['suburb'].", ".$_REQUEST['number']." ".$_REQUEST['street'] ;
  //REMOVE THREAT OF SQL INJECTION
  $location = mysqli_real_escape_string($link, $location);
  $date = mysqli_real_escape_string($link, $_REQUEST['date']);
  $players = mysqli_real_escape_string($link, $_REQUEST['playersneeded']);
  $skill = mysqli_real_escape_string($link, $_REQUEST['skill']);
  $kickoff = mysqli_real_escape_string($link, $_REQUEST['kickoff']);
  //Add game to database
  $query = "INSERT INTO Games VALUES('".$_SESSION['username']."', '".$location."', '".$date."', '".$players."', '".$skill."', DEFAULT, '".$lat."', '".$lng."', '".$kickoff."');";
  $result = mysqli_query($link, $query);
  //Get the AUTO_INCREMENT value as foreign key reference to other table
  $ai = mysqli_insert_id($link);
  $query = "INSERT INTO UserGame VALUES('".$_SESSION['username']."', '".$ai."');";
  $result = mysqli_query($link, $query);
  echo $query;
  echo mysqli_error($link);
  $db->closeConnection();
  }
?>
