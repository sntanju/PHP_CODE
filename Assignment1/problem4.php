<?php
    /// Taking user input
    $n = (int) readline("Please enter a integer number n: ");
    
    /// first loop for print n line
    for($i = 0; $i < $n; $i++) {

        /// first nested loop for print the spaces before the *
        for($j = 0; $j < $n - $i; $j++) {

            /// printing each space
            echo " ";
        }

        /// second nested loop for print the  *
        for($x = 0; $x < ($i * 2) - 1; $x++){

            /// printing each *
            echo "*";
        }

        echo "\n";
    }

?>