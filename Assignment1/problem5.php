<?php
    
    /// Taking user input
    $num = (int) readline("Please enter a integer number: ");

    /// handling negative number
    if($num < 0) $num *= -1;

    /// initializing the answer as 0
    (int) $ans = 0;

    /// loop until the number decreases to 0
    while($num) {

        /// adding the last digit of the number to the ans
        $ans += $num % 10;

        /// dividing the number with 10 to remove the last digit
        $num = (int)($num / 10);
    }

    echo $ans;

?>