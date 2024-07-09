<?php

function controleurPrincipal($action){
    $Actions = array();
    $Actions["defaut"]="home.php";
    $Actions["home"]="home.php";

    $Actions["competitions"]="competitions.php";
    $Actions["desinscriptioncompetition"]="desinscriptioncompetition.php";
    $Actions["inscriptioncompetition"]="inscriptioncompetition.php";
    $Actions["signin_competitions"]="signin_competitions.php";
    $Actions["confirmation"] = "confirmation.php";
    $Actions["gererUtilisateurs"] = "gererUtilisateurs.php";
    
    $Actions['contact'] = "contact.php";
    $Actions['connexion'] = "connexion.php";
    $Actions['suppression'] = "suppression.php";
    $Actions["deconnexion"] = "deconnexion.php";
    $Actions['inscription'] = "inscription.php";
    $Actions["updProfil"] = "updProfil.php";
    $Actions['monProfil'] = "monProfil.php";
    $Actions['events'] = "events.php";
    $Actions["desinscriptionevent"]="desinscriptionevent.php";
    $Actions["inscriptionevent"]="inscriptionevent.php";
    $Actions['maintenance'] = "maintenance.php";
    $Actions['newsletter'] = "newsletter.php";

    $Actions['addVideo'] = "addVideo.php";
    $Actions['updVideo'] = "updVideo.php";
    $Actions['video'] = "video.php";
    $Actions['suppressionVideo'] = "suppressionVideo.php";
    
    if (array_key_exists ( $action , $Actions )){
        return $Actions[$action];
    }
    else{
        return $Actions["defaut"];
    }

}

?>