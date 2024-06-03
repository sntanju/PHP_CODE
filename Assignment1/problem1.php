<?php

    /// declared a function to find the minimum number with receiving an array as a parameter
   function find_minimum_num($arr) {

        /// initialized the first value of the array as the minimum number
        $ans = $arr[0];

        /// loop started from second element to check each value
        for($i = 1; $i < sizeof($arr); $i++){
        
            $x = $arr[$i];

            /// multiplied with -1 if the number is negative
            if($x < 0) $x *= -1;

            /// checked with the current ans and replaced in need
            if($x < $ans) $ans = $x;
        }

        echo $ans;

   }

   /// taking user input
   $arr = array_map('intval', explode(' ', trim(fgets(STDIN))));
  
   find_minimum_num($arr);


?>