<!doctype html>

<html>

<head>
    <meta charset='utf-8' />
    <meta name="description" content="Football Here Brisbane: Home Page">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <title>footballhere</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
    <script type="text/javascript" src="./js/jquery-1.12.2.min.js"></script>
    <link rel="icon" type="image/png" href="./fh_favicon.png">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
      header('location: login.php');
    }
   ?>


        <noscript>
            <h1>Oops!</h1>
            <h2>This site needs JavaScript to work properly!</h2>
            <p>Try turning JavaScript on, or use a different browser.</p>
        </noscript>

        <div class="infoButton">
            <h1>&#63;</h1>
        </div>
        <div class="infoPane hidden">
            <h1>About footballhere</h1>
            <h2>&#9917;</h2>
            <p>footballhere is a platform that connects people with like-minded people who want to play a game of social football. Simply find a game happening near you and show up!</p>
            <p>You can also enter your own game onto the map, to attract new players and make new friends!</p>
        </div>

        <div id="adminArea">
            <p>Welcome
                <?php echo $_SESSION['username'] ?>
            </p>
            <form class="logoutForm" action="logout.php" method="post">
                <input class="logoutButton" type="submit" name="logout" value="Logout">
            </form>
        </div>

        <div class="darkOverlay"></div>

        <div class="loginOverlay">
            <div id="inputForm" role="Submission Form">
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

                    <select role="Dropdown" name="skill" required>
                        <option value="">Select Skill Level</option>
                        <option value="1">Beginner</option>
                        <option value="2">Amateur</option>
                        <option value="3">Advanced</option>
                    </select>


                    <input role="submit button" class="save" type="button" value="Submit" />
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
                    <a id="beginnerSkill" href="#" value="1" class="skill white">Beginner</a>
                    <a id="amateurSkill" href="#" value="2" class="skill white">Amateur</a>
                    <a id="advancedSkill" href="#" value="3" class="skill white">Advanced</a>
                </nav>
            </div>

            <div id="yourGames">
                <?php include('yourGames.php') ?>
            </div>

            <div id="map"></div>

            <div id="filteredResults" class="hidden">
                <div class="filteredBeginner">
                    <h1>Beginner</h1>
                    <?php include('filterBySkill.php'); getGameBySkill(1);?>
                </div>
                <div class="filteredAmateur">
                    <h1>Amateur</h1>
                    <?php getGameBySkill(2);?>
                </div>
                <div class="filteredAdvanced">
                    <h1>Advanced</h1>
                    <?php getGameBySkill(3);?>
                </div>
            </div>
        </main>


        <script type="text/javascript" src="./js/maps.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKnGYIJ_jRTGNnNo0s3EgC90PnZxIW5Bg&libraries=places&callback=initMap" async defer></script>
        <script type="text/javascript" src="./js/login.js"></script>
        <script type="text/javascript" src="./js/toolbar.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <!--        <script type="text/javascript" src="./js/filterBySkill.js"></script>-->


</body>

</html>
