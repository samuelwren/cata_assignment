<?php

  // Opens connection to DB
  function OpenConn()
  {
    // Database credentials
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";

    // Opens connection to DB
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn->error);
    
    return $conn;
  }

  // Closes connection to DB
  function CloseConn()
  {

  }

?>
