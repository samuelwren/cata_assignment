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

?>
