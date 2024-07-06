<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";
include_once "$racine/model/databaselogin.php"; // Assurez-vous que vous incluez ce fichier pour la connexion à la base de données

if (isLoggedOn()){
    $pseudo = getPseudoLoggedOn();
    $util = getUtilisateurByPseudo($pseudo);
    // traitement si necessaire des donnees recuperees

    // Assurez-vous que $cnx est défini correctement ici
    $cnx = DBconnection(); // Assurez-vous que DBconnection() est une fonction qui retourne la connexion PDO

    // appel du script de vue qui permet de gerer l'affichage des donnees
    include_once "$racine/view/header.php";
    include_once "$racine/view/monProfil.php";
}
else{
    include_once "$racine/view/header.php";
    include_once "$racine/view/credits.php";
}
?>
