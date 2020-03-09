<?php

  // Global Variables
  $argvs = array();
  $is_dry_running = FALSE;
  $current_arg = "";

  // Determines which arguments are being called
  // Reads through $argv and stores the argument name as the array position
  foreach( $argv as $item )
  {

    // Determines which arguement is being passed
    // Storing the arguemnt as the key in an array
    if( strpos($item, '--file' ) !== FALSE )
    {
      $current_arg = "--file";
      // Removes the file name from the input;
      $file_name = str_replace('--file[', '',$item);
      $file_name = str_replace(']', '',$file_name);
      // Saves the arguement
      $argvs[$current_arg] = $file_name;
    }
    else if('--create_table' == $item )
    {
      $current_arg = "--create_table";
      $argvs[$current_arg] = TRUE;
    }
    else if ('-u' == $item )
    {
      $current_arg = "-u";
      $argvs[$current_arg] = "";
    }
    else if ('-p' == $item )
    {
      $current_arg = "-p";
      $argvs[$current_arg] = "";
    }
    else if ('-h' == $item )
    {
      $current_arg = "-h";
      $argvs[$current_arg] = "";
    }
    else if ('--help' == $item )
    {
      $current_arg = "--help";
      $argvs[$current_arg] = "";
    }
    else if( '--dry_run' == $item )
    {
      $is_dry_running = TRUE;
    }
    else
    {
      // ignores the dash in the arguement and stores the item in the last known arguemnt
      if( $item != "-" )
      {
        $argvs[ $current_arg ] = $item;
      }
    }
  }


  //Determine which functions to call
  if( isset( $argvs["--help"] ) )
  {
      help();
  }
  if( isset($argvs["--create_table"]) )
  {
      create_table();
  }
  if( isset($argvs["-u"]) )
  {
      update_config($argvs["-u"], '$username');
  }
  if( isset($argvs["-p"]) )
  {
      update_config($argvs["-p"], '$password');
  }
  if( isset($argvs["-h"]) )
  {
      update_config($argvs["-h"], '$host');
  }
  if( isset($argvs["--file"]) )
  {
      insert_data($argvs["--file"]);
  }

  // Help Function
  function help()
  {
    echo " --file [csv file name] – this is the name of the CSV to be parsed \n";
    echo " --create_table – this will cause the MySQL users table to be built (and no further action will be taken) \n";
    echo " --dry_run – this will be used with the --file directive in case we want to run the script but not insert into the DB. All other functions will be executed, but the database won't be altered\n";
    echo " -u – MySQL username \n";
    echo " -p – MySQL password \n";
    echo " -h – MySQL host";
  }

  function create_table()
  {
    // imports connectdb.php
    include( 'connectdb.php' );

    // Opens connection
    $connection = OpenConn();

    $sql = "CREATE TABLE IF NOT EXISTS Users (
              id INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(50) NOT NULL,
              surname VARCHAR(50) NOT NULL,
              email VARCHAR(100) NOT NULL,
              UNIQUE KEY unique_email (email)
          );";

    if ($connection->query($sql)) {
        echo "Table Users, successfully created.";
    } else {
        echo "Error creating table: " . $connection->error;
    }

    // Closes connection
    CloseConn( $connection );

  }

?>
