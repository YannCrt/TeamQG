<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";

// Vérifier si l'utilisateur est connecté
if (isLoggedOn()) {
    // Récupérer l'utilisateur connecté
    $utilisateur = getUtilisateurByPseudo(getPseudoLoggedOn());
    $userId = $utilisateur['id'];

    // Récupérer les vidéos de l'utilisateur
    $videos = getVideosByUserId($userId);

    // Inclure les vues après la récupération des vidéos
    include_once "$racine/view/header.php";
    include_once "$racine/view/vueVideo.php";
    include_once "$racine/view/credits.php";
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=video");
    exit();
}

?>
