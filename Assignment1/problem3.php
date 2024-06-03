<?php
    /// Taking user input
    $sentence = readline("Please Enter A String: ");

    /// converting the string into array
    $arrayOfWords = explode(" ", $sentence);

    /// iterating each word of the array
    for($i = 0; $i < sizeof($arrayOfWords); $i++) {

        /// reversing each word
        $word = strrev($arrayOfWords[$i]);

        /// replacing the real word with the reversed word
        $arrayOfWords[$i] = $word;
    }

    /// converting the array into string
    $sentence = implode(" ", $arrayOfWords);

    echo $sentence;

?>