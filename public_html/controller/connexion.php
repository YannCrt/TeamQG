<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";

session_start(); // Démarrer la session pour utiliser les variables de session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        // Debug: Affiche les entrées de connexion
        // echo "Pseudo: " . htmlspecialchars($pseudo) . ", Mot de passe: " . htmlspecialchars($mdp);

        $utilisateur = getUtilisateurByPseudo($pseudo);

        if ($utilisateur) {
            if (password_verify($mdp, $utilisateur['mdp'])) {
                $_SESSION['pseudo'] = $utilisateur['pseudo'];
                $_SESSION['mdp'] = $utilisateur['mdp'];
                header("Location: /?action=monProfil");
                exit();
            } else {
                $_SESSION['mdp_error'] = "Mot de passe incorrect.";
                header("Location: /?action=connexion");
                exit();
            }
        } else {
            $_SESSION['pseudo_error'] = "Pseudo incorrect.";
            header("Location: /?action=connexion");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs.";
        header("Location: /?action=connexion");
        exit();
    }
} else {
    include_once "$racine/view/header.php";
    include_once "$racine/view/vueconnexion.php";
    include_once "$racine/view/credits.php";
}
?>
