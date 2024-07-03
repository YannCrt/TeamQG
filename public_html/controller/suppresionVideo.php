<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";

// Vérifier si l'utilisateur est connecté
if (isLoggedOn()) {
    // Vérifier si l'ID de la vidéo est correctement passé en paramètre
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
        $id = $_POST["id"];

        // Appel à la fonction pour supprimer la vidéo
        if (deleteVideoById($id)) {
            echo "Vidéo supprimée avec succès";
        } else {
            echo "Erreur lors de la suppression de la vidéo.";
        }
    }

    // Inclusion des vues après le traitement de la suppression de la vidéo
    include_once "$racine/view/header.php";
    include_once "$racine/view/monProfil.php";
    include_once "$racine/view/credits.php";
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    exit();
}
?>
