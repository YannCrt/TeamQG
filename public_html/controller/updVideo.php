<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";

// Vérifier si l'utilisateur est connecté
if (isLoggedOn()) {
    // Vérifier si un ID de vidéo est passé dans l'URL
    if (isset($_GET['id'])) {
        $videoToEdit = getVideoById($_GET['id']);

        // Vérifier si la vidéo à éditer existe
        if (!$videoToEdit) {
            echo "La vidéo spécifiée n'existe pas.";
            exit(); // Arrêter l'exécution si la vidéo n'est pas trouvée
        }
    } else {
        echo "ID de vidéo non spécifié.";
        exit(); // Arrêter l'exécution si l'ID de la vidéo n'est pas passé dans l'URL
    }

    // Traitement de la mise à jour de la vidéo si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["updVideo"])) {
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $fichier = file_get_contents($_FILES['fichier']['tmp_name']);
        $datee = date('Y-m-d');

        // Appel à la fonction pour mettre à jour la vidéo
        if (updVideo($id, $titre, $description, $fichier, $datee)) {
            echo "Vidéo mise à jour avec succès";
            // Redirection vers une autre page après la mise à jour si nécessaire
            // header("Location: ./autre_page.php");
            // exit();
        } else {
            echo "Erreur lors de la mise à jour de la vidéo.";
        }
    }

    // Inclusion de la vue pour afficher le formulaire de modification de la vidéo
    include_once "$racine/view/header.php";
    include_once "$racine/view/monProfil.php"; // Assurez-vous d'adapter ce chemin
    include_once "$racine/view/credits.php";
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    exit();
}
?>
