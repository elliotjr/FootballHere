<!doctype html>

<html>

<head>
    <meta charset='utf-8' />
    <title>footballhere</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
    <script type="text/javascript" src="./js/jquery-1.12.2.min.js"></script>
    <link rel="icon" type="image/png" href="./fh_favicon.png">
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
            <p>Welcome *username*</p>
            <form class="logoutForm" action="logout.php" method="post">
                <input class="logoutButton" type="submit" name="logout" value="Logout">
            </form>
        </div>

        <div class="darkOverlay"></div>

        <div class="loginOverlay">
            <div id="inputForm">
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

                    <select name="skill" required>
                        <option value="">Select Skill Level</option>
                        <option value="1">Beginner</option>
                        <option value="2">Amateur</option>
                        <option value="3">Advanced</option>
                    </select>
                    
                    
                    <input class="save" type="submit" value="Submit" />
                </form>

            </div>
        </div>

        <header>
            <h1>football</h1>
            <h1 class="bold">here</h1>
        </header>

        <main>
            <div id="toolbar">
                <a id="addGameButton" href="#">Add a Football Game</a>
                <a class="filterButton white" href="#">Filter Results</a>
                <a class="gamesButton white" href="#">Your Games</a>
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