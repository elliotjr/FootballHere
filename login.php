<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('connection.php');

session_start();

//If the user is already logged in, then they cannot login again
if (isset($_SESSION['username'])) {
  header('Location: index.php');
}

/**
*Sets the session variable for the users username and password
*/
if (isset($_POST['username']) && isset($_POST['password'])){
  $authenticated = false;
  $db = new Connection();
  $link = $db->connectDatabase();
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $query = "SELECT password FROM Users WHERE Username ='".$username."';";

  //$query = SELECT password FROM Users WHERE Username = ?";
  //$stmt = $link->prepare($query);
  //$stmt->bind_param('ss', $username);




  $result = mysqli_query($link, $query);
  $hashedPassword = md5($_POST['password']);
  if (!$result) {
    die(mysqli_error($link));
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['password'] == $hashedPassword) {
        $authenticated = true;
      }
    }
  }

  //If the user exists in the database and they have entered the correct password
  if ($result && $authenticated) {
    $_SESSION['username'] = $_REQUEST['username'];
    $_SESSION['password'] = $hashedPassword;
    header('Location: index.php');
  } else {
    echo "Incorrect Username/Password";
  }
  //Close the database connection
  $db->closeConnection();

}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="./main.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Login</h1>
    </header>

    <section class="loginWrap">
      <form class="loginForm" action="login.php" method="post">
        <p>Username</p>
        <input type="text" name="username" value="">
        <p>Password</p>
        <input type="password" name="password" value="">
        <br>
        <br>
        <input type="submit" name="name" value="Login">
		<a class="register" href="register.php"> Register </a>
      </form>
    </section>
  </body>
</html>
