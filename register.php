<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('connection.php');

session_start();

//If the user is already logged in, then they can't register again.
if (isset($_SESSION['username'])) {
  header('Location: index.php');
}

if (isset($_POST['skill']) && isset($_POST['username']) && isset($_POST['age']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['password'])) {
  $_POST['password'] = md5($_POST['password']);
  $db = new Connection();
  $link = $db->connectDatabase();
  $query = "INSERT INTO Users VALUES('".$_POST['username']."', '".$_POST['password']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['skill']."', '".$_POST['age']."');";
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  } else {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['authenticated'] = true;
    header('Location: index.php');
  }
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <link rel="stylesheet" type="text/css" href="./main.css">
     <meta charset="utf-8">
     <title>Register</title>
   </head>
   <header>
     <h1>Register</h1>
   </header>
   <body>
     <div class="loginWrap">
       <form class="" action="register.php" method="post">
         <p>Email</p>
         <input type="text" name="email" value="">
         <p>Username</p>
         <input type="text" name="username" value="">
         <p>Age</p>
         <input type="text" name="age" value="">
         <p>First Name</p>
         <input type="text" name="fname" value="">
         <p>Last Name</p>
         <input type="text" name="lname" value="">
         <p>Skill Level</p>
         <input type="text" name="skill" value="">
         <p>Password</p>
         <input type="password" name="password" value="">
         <br>
         <br>
         <input type="submit" name="name" value="Register">
       </form>
     </div>


   </body>
 </html>
