<?php

// Global Variables
$argvs = array();
$is_dry_running = FALSE;
$current_arg = "";

// Determines which arguments are being called
// Reads through $argv and stores the argument name as the array position
foreach( $argv as $item )
{

  if( strpos($item, '--file' ) !== FALSE )
  {
    $current_arg = "--file";

    $file_name = str_replace('--file[', '',$item);
    $file_name = str_replace(']', '',$file_name);

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
    if( $item != "-" )
    {
      $argvs[ $current_arg ] = $item;
    }
  }
}

?>
