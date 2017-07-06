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
        if($word_count ==1){
            $geo = $geo[0];
            if(strlen($geo) === 5){
    		    $places = query("SELECT * FROM places WHERE postal_code = ?", $geo);	
    	    }
    	    else{
    	        if(strlen($geo) ==2){
    	            $places = query("SELECT * FROM places WHERE admin_code1 = ?", strtoupper($geo));
    	        }
    	        else{
    	            $places = query("SELECT * FROM places WHERE place_name LIKE ?", $geo);
    	        }
    	    }

    	if(empty($places)){
    	    $places = query("SELECT * FROM places WHERE admin_name1 LIKE ?", $geo);
    	}
    }
    if($word_count > 2){
        $geo = implode(" ", $geo);
        $places = query("SELECT * FROM places WHERE MATCH(postal_code, place_name, admin_name1, admin_code1) AGAINST (?)", $geo);
    }
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>