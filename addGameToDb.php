<?php

include('connection.php');
include('geoCode.php');

session_start();

if(isset($_REQUEST)) {
  $geoCodeJson = buildUrl($_REQUEST['state'], $_REQUEST['city'], $_REQUEST['suburb'], $_REQUEST['street'], $_REQUEST['number']);
  $coordinates = getLatLong($geoCodeJson);
  $lat = $coordinates[0];
  $lng = $coordinates[1];
  $db = new Connection();
  $link = $db->connectDatabase();
  error_reporting(E_ALL && ~E_NOTICE);
  $query = "INSERT INTO Games VALUES('".$_SESSION['username']."', '".$_REQUEST['location']."', '".$_REQUEST['date']."', '".$_REQUEST['playersneeded']."', '".$_REQUEST['skill']."', NULL, '".$lat."', '".$lng."');";
  echo $query;
  $result = mysqli_query($link, $query);
  print_r($query);
  $db->closeConnection();
  }
?>
