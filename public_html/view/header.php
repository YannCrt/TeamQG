<!DOCTYPE html>
<html>
<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/view/head.php"; 
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

$is_admin = false;

// Vérifier si l'utilisateur est connecté et administrateur
if (isLoggedOn()) {
    $pseudo = getPseudoLoggedOn();
    $utilisateur = getUtilisateurByPseudo($pseudo);
    
    if ($utilisateur && estAdmin($utilisateur['id'])) {
        $is_admin = true;
    }
}
?>
<body>
    <div class='header'>
        <table class='navigation' cellspacing='0'>
            <tr>
                <td class='table_cell'>
                    <a href='../index.php'><img src='../assets/logo.png' width='70vmax'></a>
                </td>
                <td class='table_cell'><a class='navibutton' href='./?action=competitions'>Compétitions</a></td>
                <td class='table_cell'><a class='navibutton' href='./?action=events'>Evenements</a></td>
                <td class='table_cell'><a class='navibutton' href='index.php#members'>Membres</a></td>
                <td class='table_cell'><a class='navibutton' href='./?action=contact'>Contact</a></td>
                <?php if (isLoggedOn()) { ?>
                    <td class='table_cell'>
                        <a class='navibutton' href='./?action=monProfil' alt='Profil'>Profil</a>
                    </td>
                    <?php if ($is_admin) { ?>
                        <td class='table_cell'>
                            <a class='navibutton' href='./?action=gererUtilisateurs' alt='Gérer les utilisateurs'>Gérer</a>
                        </td>
                    <?php } ?>
                <?php } else { ?>
                    <td class='table_cell'>
                        <a class='navibutton' href='./?action=connexion' alt='Connexion'>Connexion</a>
                    </td>
                <?php } ?>
            </tr>
        </table>
    </div>
    <script type='text/javascript' src='../model/header.js'></script>
</body>
</html>
