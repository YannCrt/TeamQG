<?php
include "getRacine.php";
include "$racine/controller/controleurPrincipal.php";
include_once "$racine/model/authentification.php"; // pour pouvoir utiliser isLoggedOn()



if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "$racine/controller/$fichier";


?>
     