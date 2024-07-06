<?php
$racine = $_SERVER['DOCUMENT_ROOT']; // Définit le chemin racine du document

include_once "$racine/model/utilisateurs.php";
$inscrit = false;
$msg = "";

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mail'])) {
        // Utilisation de htmlspecialchars pour protéger les entrées utilisateur
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mail = htmlspecialchars($_POST['mail']);

        // Ajout de l'utilisateur à la base de données
        $ret = addUtilisateur($prenom, $nom, $pseudo, $mdp, $mail);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "L'utilisateur n'a pas été enregistré.";
        }
    } else {
        $msg = 'Veuillez renseigner tous les champs obligatoires.';
    }
}

include "$racine/view/header.php";
if ($inscrit) {
    include "$racine/view/head.php";
    include "$racine/view/vueInscriptionconfirmé.php"; // Page de confirmation d'inscription
} else {
    include "$racine/view/head.php";
    include "$racine/view/vueinscription.php"; // Formulaire d'inscription
}
include "$racine/view/credits.php";
?>
