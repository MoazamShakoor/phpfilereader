 <?php
    // read the file contents.
    $text = file_get_contents("test.txt");

    // search for the occurences with square brackets.
    preg_match_all("/\[([^\]]*)\]/",$text,$matches, PREG_PATTERN_ORDER);

    // check if anything found
    if(isset($matches) && isset($matches[1])) {
        // print the text to the browser's console.
        foreach($matches[1] as $word) {
            console_log($word);
        }
    }
    
    // method to print the text to console.
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
