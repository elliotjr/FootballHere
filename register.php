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
        <link rel="stylesheet" type="text/css" href="./main.css">
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/formval.js"></script>
        <meta charset="utf-8">
        <title>Register</title>
    </head>

    <body>
        <header>
            <h1>football</h1>
            <h1 class="bold">here</h1>
        </header>

        <noscript>
            <h1>Oops!</h1>
            <h2>This site needs JavaScript to work properly!</h2>
            <p>Try turning JavaScript on, or use a different browser.</p>
        </noscript>


        <div class="loginWrap">
            <h1>Register</h1>
            <form id="inputForm" id="register" action="register.php" method="post">
                <p>Email</p>
                <input type="text" id="r_email" name="email" value="">
                <span class="error">This field is required</span>
                <p>Username</p>
                <input type="text" id="r_username" name="username" value="">
                <span class="error">This field is required</span>
                <p>Age</p>
                <input type="text" id="r_age" name="age" value="">
                <span class="error">This field is required</span>
                <p>First Name</p>
                <input type="text" id="r_fname" name="fname" value="">
                <span class="error">This field is required</span>
                <p>Last Name</p>
                <input type="text" id="r_lname" name="lname" value="">
                <span class="error">This field is required</span>
                <p>Skill Level</p>
                <select name="skill">
                    <option value="1">Beginner</option>
                    <option value="2">Intermediate</option>
                    <option value="3">Expert</option>
                </select>
                <p>Password</p>
                <input type="password" id="r_password" name="password" value="">
                <span class="error">This field is required</span>
                <br>
                <br>
                <input type="submit" id="r_submit" name="name" value="Register">
            </form>
        </div>


    </body>

    </html>