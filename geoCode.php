<?php


function buildUrl($state1, $city1, $suburb1, $streetname1, $number1) {
  $state = str_replace(" ","_", $state1);
  $city = str_replace(" ","_", $city1);
  $suburb = str_replace(" ","_", $suburb1);
  $streetname = str_replace(" ","_", $streetname1);
  $number = $number1;

  $apiKey = "AIzaSyDGdHCkGTPqI3BGJfuQD3tk1cbkkjOpDs4";
  $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$number."+".$suburb."+".$streetname.",+".$city.",+".$state."&key=".$apiKey."";
  $json = file_get_contents($url);
  $obj = json_decode($json);
  return $obj;
}

function getLatLong($json) {
  $lat = $json->results[0]->geometry->location->lat;
  $lng = $json->results[0]->geometry->location->lng;
  $array = array($lat, $lng);
  return $array;
}

//$json = buildUrl("QLD", "Brisbane", "Corinda", "Dart St", 26);
//$coordinates = getLatLong($json);
