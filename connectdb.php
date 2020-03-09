<?php

  // Opens connection to DB
  function OpenConn()
  {
    //connect config.php
    include( 'config.php' );

    // Database credentials
    $dbhost = $host;
    $dbuser = $username;
    $dbpass = $password;

    // Opens connection to DB
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn->error);

    return $conn;
  }

  // Closes connection to DB
  function CloseConn( $conn )
  {
      $conn->close();
  }

?>
