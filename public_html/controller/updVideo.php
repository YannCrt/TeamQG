<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";

$message = ""; // Initialisez le message de succès à vide

if (isLoggedOn()) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $video = getVideoById($id); // Fonction à implémenter pour récupérer les détails de la vidéo par son ID

        if (!$video) {
            // Gérer le cas où la vidéo n'est pas trouvée
            $message = "La vidéo sélectionnée n'existe pas.";
        }

        if (isset($_POST["titre"]) && isset($_POST["description"])) {
            $titre = $_POST["titre"];
            $description = $_POST["description"];
            
            // Vérifier que les champs ne sont pas vides
            if (!empty($titre) && !empty($description)) {
                if (updVideo($id, $titre, $description)) { 
                    header("Location: ./?action=video");// Fonction à implémenter pour mettre à jour la vidéo
                    $message .= "Vidéo mise à jour avec succès. ";
                } else {
                    $message .= "Erreur lors de la mise à jour de la vidéo. ";
                }
            } else {
                $message .= "Les champs Titre et Description sont obligatoires. ";
            }
        }

        // Redirection vers la page vueUpdVideo.php avec le message
        include_once "$racine/view/header.php";
        include_once "$racine/view/updVideo.php";
        include_once "$racine/view/credits.php";

    } else {
        // Gérer le cas où l'ID de la vidéo n'est pas spécifié
        $message = "L'identifiant de la vidéo n'est pas valide.";
        include_once "$racine/view/header.php";
        include_once "$racine/view/credits.php";
    }
} else {
    include_once "$racine/view/header.php";
    include_once "$racine/view/credits.php";
}
?>
