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
        <title>Login | footballhere</title>
        <link rel="icon" type="image/png" href="./fh_favicon.png">
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

        <section class="loginOverlay visible">
            <div id="inputForm">
                <form class="loginForm" action="login.php" method="post">
                   
                   <h1>Login</h1>
                    
                    <div class="formGroup">
                        <input type="text" name="username" required>
                        <label>Username</label>
                        <span class="error">This field is required</span>
                    </div>
                    
                    <div class="formGroup">
                        <input type="password" name="password" required>
                        <label>Password</label>
                        <span class="error">This field is required</span>
                    </div>
                    <input type="submit" name="name" value="Login">
                    <br>
                    <p>Don't have an account?</p>
                    <a class="register" href="register.php">Register</a>
                </form>
            </div>
        </section>
    </body>

    </html>