<?php

  /**
  *MySQL connection class to connect to database
  */
  class Connection {

    //Host name
    var $host = "localhost";
    //Username
    var $username = "root";
    //Password
    var $password = "";
    //Database name
    var $databaseName = "FootballHere";
    //MYSQLI connection instance
    var $myConn;

    /**
    *Connect to the database specified in databaseName.
    *@return The database connection created.
    */
    function connectDatabase() {
      $conn = mysqli_connect($this->host, $this->username, $this->password);
      if(!$conn) {
        die("Cannot connect to the database");
      } else {
        $this->myConn = $conn;
      }
      $db = mysqli_select_db($this->myConn, $this->databaseName);
      if(!$db) {
        die ('Cannot Use Database');
      }
      return $this->myConn;
    }

    function getConnection() {
      return $this->myConn;
    }



    /**
    *Close database connection.
    */
    function closeConnection() {
      mysqli_close($this->myConn);
    }

  }
