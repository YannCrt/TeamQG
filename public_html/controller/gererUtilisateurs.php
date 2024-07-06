<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

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
?>
