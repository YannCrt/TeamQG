<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/video.php";
include_once "$racine/model/utilisateurs.php";

// Vérifier si l'utilisateur est connecté
if (isLoggedOn()) {
    // Récupérer l'utilisateur connecté
    $pseudo = getPseudoLoggedOn();
    $utilisateur = getUtilisateurByPseudo($pseudo);
    $userId = $utilisateur['id'];
    
    // Vérifier si l'utilisateur est administrateur
    $is_admin = estAdmin($userId);
    $selected_user_id = null;
    $search_pseudo = '';
    $videos = [];

    // Récupérer tous les utilisateurs (pour les administrateurs)
    $utilisateurs = $is_admin ? getUtilisateurs() : [];

    // Gérer la sélection de l'utilisateur ou la recherche par pseudo
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['utilisateur_id'])) {
            $selected_user_id = $_POST['utilisateur_id'];
            $videos = getVideosByUserId($selected_user_id);
        } elseif (isset($_POST['search_pseudo'])) {
            $search_pseudo = $_POST['search_pseudo'];
            $searched_user = getUtilisateurByPseudo($search_pseudo);
            if ($searched_user) {
                $selected_user_id = $searched_user['id'];
                $videos = getVideosByUserId($selected_user_id);
            } else {
                $videos = [];
            }
        }
    } else {
        // Par défaut, afficher les vidéos de l'utilisateur connecté
        $videos = getVideosByUserId($userId);
    }

    // Inclure les vues après la récupération des vidéos
    include_once "$racine/view/header.php";
    include_once "$racine/view/vueVideo.php";
    include_once "$racine/view/credits.php";
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    exit();
}
?>
