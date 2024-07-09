<?php

$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/events.php";
include_once "$racine/model/authentification.php";
include_once "$racine/view/header.php";

// Vérifier si un utilisateur est connecté
$isLoggedIn = isLoggedOn(); // Utilisez votre propre méthode pour vérifier la connexion

if ($isLoggedIn && isset($_GET['action']) && $_GET['action'] === 'inscription_event') {
    // Gestion de l'inscription à l'événement
    if (isset($_GET['event_id'])) {
        $event_id = $_GET['event_id'];// Démarrer la session pour accéder à $_SESSION
        $utilisateur = getPseudoLoggedOn(); // Utilisateur connecté, vous devez obtenir l'ID de la session
        $user_id = getUtilisateurByPseudo($utilisateur);
        $success = registerUserToEvent($event_id, $user_id['id']);
        
        if ($success) {
            echo "Inscription réussie à l'événement.";
        } else {
            echo "Erreur lors de l'inscription à l'événement.";
            echo "user = $user_id. event = $event_id";
        }
    } else {
        echo "Paramètre event_id manquant.";
    }
} else {
    include_once "$racine/view/eventsView.php";
}

include_once "$racine/view/credits.php";
?>
