<?php

$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/events.php";
include_once "$racine/model/authentification.php";

// Vérifier si un utilisateur est connecté
if (isLoggedOn()) {
    if (isset($_POST['event_id'])) {
        $event_id = $_POST['event_id'];
        $utilisateur = getPseudoLoggedOn();
        $user = getUtilisateurByPseudo($utilisateur);
        $user_id = $user['id'];

        $success = unregisterUserFromEvent($event_id, $user_id);
        
        if ($success) {
            include_once "$racine/view/header.php";
            include_once "$racine/view/vueDésinscriptionconfirmé.php";
            include_once "$racine/view/credits.php";
        } else {
            echo "Erreur lors de la désinscription de l'évenement.";
        }
    } else {
        echo "Paramètre event_id manquant.";
    }
} else {
    echo "Vous devez être connecté pour vous désinscrire de l'évenement.";
}
?>
