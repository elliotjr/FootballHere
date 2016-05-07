<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

   session_start();
   //Unset session variables
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   //Redirect to login.php
   header('Location: login.php');
