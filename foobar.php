<?php

  $number = 1;

  do {
    $output_string = "";
    if( $number % 3 == 0 )
    {
      $output_string .= "foo";
    }
    if( $number % 5 == 0  )
    {
      $output_string .= "bar";
    }
    if( $number % 5 != 0 && $number % 3 != 0 )
    {
      $output_string = $number;
    }

    echo "$output_string \n";
    $number++;
  } while ($number <= 100);

?>
