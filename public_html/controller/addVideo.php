<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";
include_once "$racine/model/utilisateurs.php";

if (isLoggedOn()) {
    $pseudo = getPseudoLoggedOn();
    $utilisateur = getUtilisateurByPseudo($pseudo);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["ajouter_video"])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $fichier = file_get_contents($_FILES['fichier']['tmp_name']);
        $datee = $_POST['datee'];
        
        // Vérifie si l'utilisateur est administrateur pour déterminer l'utilisateur cible
        if ($utilisateur && estAdmin($utilisateur['id'])) {
            $utilisateur_id = isset($_POST['utilisateur_id']) ? $_POST['utilisateur_id'] : $utilisateur['id'];
        } else {
            $utilisateur_id = $utilisateur['id'];
        }

        try {
            if (addVideo($titre, $description, $fichier, $datee, $utilisateur_id)) {
                header("Location: /?action=video");
                exit();
            } else {
                header("Location: /?action=video"); // Redirection en cas d'échec (à adapter)
                exit();
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout de la vidéo : " . $e->getMessage();
        }
    }

    // Récupérez les vidéos pour l'utilisateur connecté ou l'utilisateur sélectionné si l'administrateur
    if ($utilisateur && estAdmin($utilisateur['id'])) {
        $videos = getVideosByUserId(isset($_POST['utilisateur_id']) ? $_POST['utilisateur_id'] : $utilisateur['id']);
    } else {
        $videos = getVideosByUserId($utilisateur['id']);
    }

    include_once "$racine/view/header.php";
    include_once "$racine/view/addvideo.php";
    include_once "$racine/view/credits.php";
} else {
    header("Location: ./?action=connexion");
    exit();
}
?>
