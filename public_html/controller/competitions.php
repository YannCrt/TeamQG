<?php

$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/competitions.php";
include_once "$racine/model/authentification.php";
include_once "$racine/view/header.php";

// Vérifier si un utilisateur est connecté
$isLoggedIn = isLoggedOn(); // Utilisez votre propre méthode pour vérifier la connexion

if ($isLoggedIn && isset($_GET['action']) && $_GET['action'] === 'inscription_competition') {
    // Gestion de l'inscription à l'événement
    if (isset($_GET['competition_id'])) {
        $competition_id = $_GET['competition_id'];
        $utilisateur = getPseudoLoggedOn();
        $user_id = getUtilisateurByPseudo($utilisateur);// Utilisateur connecté, vous devez obtenir l'ID de la session
        
        $success = registerUserToCompetition($competition_id, $user_id['id']);
        
        if ($success) {
            echo "Inscription réussie à la compétition.";
        } else {
            echo "Erreur lors de l'inscription à la compétition.";
        }
    } else {
        echo "Paramètre competition_id manquant.";
    }
} else {
    include_once "$racine/view/competitionView.php";
}

include_once "$racine/view/credits.php";
?>
S