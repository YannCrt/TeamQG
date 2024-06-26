<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

if (isLoggedOn()){
    $pseudo = getPseudoLoggedOn();
    $util = getUtilisateurByPseudo($pseudo);
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    include_once "$racine/view/header.php";
    include_once "$racine/view/monProfil.php";
    include_once "$racine/view/credits.php";
}
else{
    include_once "$racine/view/header.php";
    include_once "$racine/view/credits.php";
}

?>
