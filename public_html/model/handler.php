<?php

function controllerhub($action) {
    $Actions = array();
    $Actions["default"]="home.php";
    $Actions["home"]="home.php";

    $Actions["competitions"]="competitions.php";
    $Actions["signin_competitions"]="signin_competitions.php";
    $Actions["confirmation"] = "confirmation.php";
    
    $Actions['contact'] = "contact.php";
    $Actions['events'] = "events.php";
    $Actions['maintenance'] = "maintenance.php";
    $Actions['newsletter'] = "newsletter.php";
    
    if (array_key_exists($action, $Actions)) {
        return $Actions[$action];
    }
    else {
        return $Actions["default"];
    }
}

?>
