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
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $fname = mysqli_real_escape_string($link, $_POST['fname']);
  $lname = mysqli_real_escape_string($link, $_POST['lname']);
  $skill = mysqli_real_escape_string($link, $_POST['skill']);
  $age = mysqli_real_escape_string($link, $_POST['age']);
  $query = "INSERT INTO Users VALUES('".$username."', '".$_POST['password']."', '".$fname."', '".$lname."', '".$skill."', '".$age."');";
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
      <meta name="description" content="Football Here Brisbane: Register">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <link rel="stylesheet" type="text/css" href="./main.css">
      <script type="text/javascript" src="./js/jquery-1.12.2.min.js"></script>
      <meta charset="utf-8">
      <title>Register | footballhere</title>
      <link rel="icon" type="image/png" href="./fh_favicon.png">
    </head>

    <body>
        <header>
            <h1>football</h1>
            <h1 class="bold">here</h1>
        </header>

        <div class="infoButton">
            <h1>&#63;</h1>
        </div>
        <div class="infoPane hidden">
            <h1>About footballhere</h1>
            <h2>&#9917;</h2>
            <p>footballhere is a platform that connects people with like-minded people who want to play a game of social football. Simply find a game happening near you and show up!</p>
            <p>You can also enter your own game onto the map, to attract new players and make new friends!</p>
        </div>


        <div class="loginOverlay visible">
            <div id="inputForm">
                <form id="" id="register" action="register.php" method="post" autocomplete="off">
                    <h1>Register</h1>

					<div class="formGroup">
                        <input type="text" id="fname" name="fname" required>
                        <label>First Name</label>
                    </div>

                     <div class="formGroup">
                        <input type="text" id="lname" name="lname" required>
                        <label>Last Name</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" id="username" name="username" required>
                        <label>Username</label>
                    </div>

                    <div class="formGroup">
                        <input type="email" id="email" name="email" required>
                        <label>Email</label>
                    </div>

                    <div class="formGroup">
                        <input type="password" id="password" name="password" required>
                        <label>Password</label>
                    </div>

					<div class="formGroup">
                        <input type="number" id="age" name="age" required>
                        <label>Age</label>
                    </div>

					<select id="skill" name="skill" required role="skill">
                        <option value="">Select Skill Level</option>
                        <option value="1">Beginner</option>
                        <option value="2">Amateur</option>
                        <option value="3">Advanced</option>
                    </select>

                    <br>
                    <br>
                    <input type="submit" id="submit" name="name" value="Register">
                </form>
            </div>
        </div>

    <script type="text/javascript" src="./js/toolbar.js"></script>
    </body>



    </html>
