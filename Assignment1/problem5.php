<?php
    
    /// Taking user input
    $num = (int) readline("Please enter a integer number: ");

    /// initializing the answer
    (int) $ans = 0;

    /// loop until the number decreases to 0
    while($num) {

        /// adding the last digit of the number
        $ans += $num % 10;

        /// dividing the number with 10 to remove the last digit
        $num = (int)($num / 10);
    }

    echo $ans;

?>