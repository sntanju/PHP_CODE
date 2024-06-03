<?php

    /// reading the contents of the text file
    $fileTexts = file_get_contents('document.txt');

    /// counting the words in the file
    $words = str_word_count($fileTexts);
    
    echo $words;
?>