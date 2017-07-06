<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // TODO: search database for places matching $_GET["geo"], store in $places
        $geo=$_GET["geo"];
        $geo=str_replace(",", " ", $geo);
        $geo = trim($geo);
        
        //word count entered into search..
        $geo = explode(" ", $geo);
        $word_count = count($geo);
        if($word_count< 1){
            print("Enter query..");
        }
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>