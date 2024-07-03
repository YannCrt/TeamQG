<?php
$racine = $_SERVER['DOCUMENT_ROOT'];

include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

$message = ""; // Initialisez le message de succès à vide

if (isLoggedOn()) {
    $util = getPseudoLoggedOn();
    $mail = getMailByPseudo($util);

    if (isset($_POST["prenom"])) {
        $prenom = $_POST["prenom"];
        if (!empty($prenom)) {
            if (UpdPrenomUtilisateur($prenom, $mail)) {
                $message .= "Prénom mis à jour avec succès. ";
            } else {
                $message .= "Erreur lors de la mise à jour du prénom. ";
            }
        }
    }

    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
        if (!empty($nom)) {
            if (UpdNomUtilisateur($nom, $mail)) {
                $message .= "Nom mis à jour avec succès. ";
            } else {
                $message .= "Erreur lors de la mise à jour du nom. ";
            }
        }
    }

    if (isset($_POST["pseudo"])) {
        $pseudo = $_POST["pseudo"];
        if (!empty($pseudo)) {
            if (UpdPseudoUtilisateur($mail, $pseudo)) {
                $message .= "Pseudo mis à jour avec succès. ";
            } else {
                $message .= "Erreur lors de la mise à jour du pseudo. ";
            }
        }
    }

    if (isset($_POST["mdp"]) && isset($_POST["mdp2"])) {
        $mdp = $_POST["mdp"];
        $mdp2 = $_POST["mdp2"];
        if (!empty($mdp) && !empty($mdp2) && $mdp == $mdp2) {
            if (updMdpUtilisateur($mail, $mdp)) {
                $message .= "Mot de passe mis à jour avec succès. ";
            } else {
                $message .= "Erreur lors de la mise à jour du mot de passe. ";
            }
        } else {
            $message .= "Les mots de passe ne correspondent pas ou sont vides. ";
        }
    }

    // Redirection vers la page vueUpdProfil.php avec le message
    include_once "$racine/view/header.php";
    include_once "$racine/view/updProfil.php";
    include_once "$racine/view/credits.php";

} else {
    include_once "$racine/view/header.php";
    include_once "$racine/view/credits.php";
}
?>
