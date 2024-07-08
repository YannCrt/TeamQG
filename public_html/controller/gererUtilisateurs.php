<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";
include_once "$racine/model/databaselogin.php"; // Inclusion du fichier contenant les fonctions
include_once "$racine/model/video.php"; // Inclusion du fichier contenant les fonctions de gestion des vidéos

// Démarrer la session pour accéder aux variables de session
if (isLoggedOn()) {
    $pseudo = getPseudoLoggedOn();
    $utilisateur = getUtilisateurByPseudo($pseudo);
    
    if ($utilisateur && estAdmin($utilisateur['id'])) {
        $is_admin = true;
    }
}

if ($is_admin) {
    // Traitement des actions POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['action']) && isset($_POST['id_utilisateur'])) {
            $action = $_POST['action'];
            $id_utilisateur = $_POST['id_utilisateur'];

            // Traitement de l'action
            switch ($action) {
                case 'supprimer':
                    deleteUtilisateurById($id_utilisateur);
                    break;
                case 'ajouter_admin':
                    ajouterAdmin($id_utilisateur);
                    break;
                case 'retrograder':
                    retrograder($id_utilisateur);
                    break;
                // Ajouter une nouvelle action pour la gestion des vidéos
                case 'video':
                    header("Location: /?action=gererVideos&utilisateur_id=$id_utilisateur");
                    exit();
                default:
                    // Gestion des autres actions si nécessaire
                    break;
            }
        }

        // Redirection après traitement des actions
        header("Location: /?action=gererUtilisateurs");
        exit();
    }

    // Récupérer tous les utilisateurs depuis la base de données
    $utilisateurs = getUtilisateurs();

    // Inclure la vue pour afficher les utilisateurs
    include_once "$racine/view/header.php";
    include_once "$racine/view/gererUtilisateurs.php";
    include_once "$racine/view/credits.php";
} else {
    header("Location: /?action=deconnexion");
}
?>
