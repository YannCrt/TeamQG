<?php

$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/competitions.php";
include_once "$racine/model/authentification.php";

// Vérifier si un utilisateur est connecté
if (isLoggedOn()) {
    if (isset($_POST['competition_id'])) {
        $competition_id = $_POST['competition_id'];
        $utilisateur = getPseudoLoggedOn();
        $user = getUtilisateurByPseudo($utilisateur);
        $user_id = $user['id'];

        $success = unregisterUserFromCompetition($competition_id, $user_id);
        
        if ($success) {
            include_once "$racine/view/header.php";
            include_once "$racine/view/vueDésinscriptionconfirmé.php";
            include_once "$racine/view/credits.php";
        } else {
            echo "Erreur lors de la désinscription de la compétition.";
        }
    } else {
        echo "Paramètre competition_id manquant.";
    }
} else {
    echo "Vous devez être connecté pour vous désinscrire d'une compétition.";
}
?>
