<!doctype html>

<html>

<head>
    <meta charset='utf-8' />
    <title>football here</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
    <script type="text/javascript" src="./js/jquery-1.12.2.min.js"></script>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        //The website shouldn't need a login immediately.
//      header('location: login.php');
    }
   ?>


        <noscript>
            <h1>Oops!</h1>
            <h2>This site needs JavaScript to work properly!</h2>
            <p>Try turning JavaScript on, or use a different browser.</p>
        </noscript>

        <div id="adminArea">
            <p>Welcome Username</p>
            <form class="logoutForm" action="logout.php" method="post">
                <input class="logoutButton" type="submit" name="logout" value="Logout">
            </form>
        </div>

        <div class="darkOverlay"></div>

        <div class="loginOverlay">
            <div id="loginForm">
                <h1>Add a Game</h1>
                <form class="addGame" action="addGameToDb.php" method="post">

                    <div class="formGroup">
                        <input type="text" name="state" required>
                        <label>State</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" name="city" required>
                        <label>City</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" name="suburb" required>
                        <label>Suburb</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" name="street" required>
                        <label>Street</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" name="number" required>
                        <label>Number</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" onfocus="(this.type='date')" onfocusout="(this.type='text')" name="date" placeholder=" " required>
                        <label>Date</label>
                    </div>

                    <!--                <input type="date" name="date" value="">-->

                    <div class="formGroup">
                        <input type="text" name="kickoff" required>
                        <label>Kickoff Time (24hr)</label>
                    </div>

                    <div class="formGroup">
                        <input type="text" name="playersneeded" required>
                        <label>Players Needed</label>
                    </div>



                    <select name="skill">
                        <option selected="true" disabled>Select Skill Level</option>
                        <option value="1">Beginner</option>
                        <option value="2">Amateur</option>
                        <option value="3">Advanced</option>
                    </select>
                    <input class="save" type="button" value="Submit" />
                </form>

            </div>

            <div id="signupForm">
                <h1>Sign Up</h1>
                <form action="signup.php" method="post">
                    <p>Email</p>
                    <input type="text" />

                    <p>Password</p>
                    <input type="password" />

                    <input type="submit" value="Submit" />
                </form>

                <div class="noAccount">
                    <p>Already have an account?</p>
                    <a id="goToLogin" href="#">Log In</a>
                </div>
            </div>
        </div>

        <header>
            <h1>football</h1>
            <h1 class="bold">here</h1>
        </header>

        <main>
            <div id="toolbar">
                <a id="loginButton" href="#">Add a Football Game</a>
                <a class="filterButton whiteFilterButton" href="#">Filter Results</a>
                <a class="games" href="#">Your Games</a>
            </div>

            <div id="filters">

                <nav id="skillLevel">
                    <a href="#" value="1" class="skill">Beginner</a>
                    <a href="#" value="2" class="skill">Amateur</a>
                    <a href="#" value="3" class="skill">Advanced</a>
                </nav>
            </div>

            <div id="yourGames">
                <?php include('yourGames.php') ?>
            </div>

            <div id="map"></div>
        </main>


        <script type="text/javascript" src="./js/maps.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKnGYIJ_jRTGNnNo0s3EgC90PnZxIW5Bg&libraries=places&callback=initMap" async defer></script>
        <script type="text/javascript" src="./js/login.js"></script>
        <script type="text/javascript" src="./js/toolbar.js"></script>
        <script type="text/javascript" src="ajax.js"></script>


</body>

</html>