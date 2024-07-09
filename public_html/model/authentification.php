<?php 

include_once "utilisateurs.php";

function login($pseudo, $mdp) {
    $utilisateur = getUtilisateurByPseudo($pseudo);
    
    if ($utilisateur && password_verify($mdp, $utilisateur['mdp'])) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['pseudo'] = $utilisateur['pseudo'];
        $_SESSION['mdp'] = $utilisateur['mdp'];
        // Ajoutez d'autres informations utilisateur si nécessaire
        return true;
    } else {
        return false;
    }
}
    

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION['pseudo']);
    unset($_SESSION['mdp']);
}

function getPseudoLoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION['pseudo'];
    }
    else {
        $ret = "";
    }
    return $ret;
}
function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION["pseudo"])) {
        $util = getUtilisateurByPseudo($_SESSION['pseudo']);
        if ($util && $util['pseudo'] == $_SESSION['pseudo'] && $util['mdp'] == $_SESSION['mdp']) { 
            return true;
        }  
    }
    return false;
}
?>