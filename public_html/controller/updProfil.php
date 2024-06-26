<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

if (isLoggedOn()){
    $pseudo = getPseudoLoggedOn();
    $util = getUtilisateurByPseudo($pseudo);
    // traitement si necessaire des donnees recuperees

    if (isset($_POST["pseudo"])){
        $pseudo = $_POST["pseudo"];
        if ($pseudo!=""){
            updtPseudoUtilisateur($id, $pseudo);
        }
    }
    
    if (isset($_POST["mdp"]) && isset($_POST["mdp2"])) {
        if ($_POST["mdp"] != "") {
            if (($_POST["mdp"] == $_POST["mdp2"])) {
                updtMdpUtilisateur($mail, $_POST["mdp"]);
            } else {
                $messageMdp = "erreur de saisie du mot de passe";
            }
        }
    }


    // appel du script de vue qui permet de gerer l'affichage des donnees
    include_once "$racine/view/header.php";
    include_once "$racine/view/updProfil.php";
    include_once "$racine/view/credits.php";
}
else{
    include_once "$racine/view/header.php";
    include_once "$racine/view/credits.php";
}

?>
