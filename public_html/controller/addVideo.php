<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";
include_once "$racine/model/utilisateurs.php";

if (isLoggedOn()) {
    $pseudo = getPseudoLoggedOn();
    $util = getUtilisateurByPseudo($pseudo);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["ajouter_video"])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $fichier = file_get_contents($_FILES['fichier']['tmp_name']);
        $datee = date('Y-m-d');
        $utilisateur_id = $util['id'];

        try {
            if (addVideo($titre, $description, $fichier, $datee, $utilisateur_id, $pdo)) {
                header("Location: /?action=video");
                exit();
            } else {
                header("Location: /?action=video"); // Ce cas ne devrait pas se produire avec le retour true
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout de la vidéo : " . $e->getMessage();
        }
    }

    $videos = getVideosByUserId($util['id'], $pdo);

    include_once "$racine/view/header.php";
    include_once "$racine/view/addvideo.php";
    include_once "$racine/view/credits.php";
} else {
    header("Location: ./?action=connexion");
    exit();
}
?>
