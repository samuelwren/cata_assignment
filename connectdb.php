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

  // Determines if the table exist
  function table_exist( $conn )
  {
    $sql = "SELECT 1 FROM Users LIMIT 0";;
  	if( $conn->query($sql) )
    {
      return TRUE;
    }
  	else
    {
  		return FALSE;
    }
  }

  // Closes connection to DB
  function CloseConn( $conn )
  {
      $conn->close();
  }

?>
