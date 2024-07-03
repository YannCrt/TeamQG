<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";

// Vérifier si l'utilisateur est connecté
if (isLoggedOn()) {
    // Si la méthode de requête est POST et le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["addVideo"])) {
        // Récupérer les données du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $fichier = file_get_contents($_FILES['fichier']['tmp_name']);
        $datee = date('Y-m-d');

        // Appel à la fonction pour ajouter la vidéo
        if (addVideo($titre, $description, $fichier, $datee)) {
            echo "Vidéo ajoutée avec succès";
        } else {
            echo "Erreur lors de l'ajout de la vidéo.";
        }
    }

    // Inclusion des vues après l'ajout de la vidéo
    include_once "$racine/view/header.php";
    include_once "$racine/view/monProfil.php";
    include_once "$racine/view/credits.php";
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    exit();
}
?>
