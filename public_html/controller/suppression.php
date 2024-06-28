<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

// Définir la variable $pseudo avant d'inclure la vue
if (isLoggedOn()) {
    // Récupérer le pseudo de l'utilisateur connecté
    $pseudo = getPseudoLoggedOn();

    // Si la méthode de requête est POST, traiter la suppression
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["pseudo"])) {
        $pseudo = $_POST["pseudo"];

        // Appel à la fonction de suppression
        if (deleteUtilisateurbypseudo($pseudo)) {
            header("Location: ./?action=connexion");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    exit();
}

include_once "$racine/view/header.php";
include_once "$racine/view/vueSuppression.php";
include_once "$racine/view/credits.php";
?>
