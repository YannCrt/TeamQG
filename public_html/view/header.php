<!DOCTYPE html>
<html>
<?php include_once "$racine/view/head.php"; 
include_once "$racine/model/authentification.php" ?>    
    <body>

<div class='header'>
    <table class ='navigation' cellspacing = '0'>
        <td class = 'table_cell'><?php echo "<a href='../index.php'><img src ='../assets/logo.png' width = '70vmax'></a>";?></td>
        <td class = 'table_cell'><a class ='navibutton' href ='./?action=competitions'>Compétitions</a></td>
        <td class = 'table_cell'><a class ='navibutton' href ='./?action=events'>Evenements</a></td>
        <td class = 'table_cell'><a class ='navibutton' href ='index.php#members'>Membres</a></td>
        <td class = 'table_cell'><a class ='navibutton' href ='./?action=contact'>Contact</a></td>
        <?php if (isLoggedOn()) { ?>
        <td class = 'table_cell'><a class ='navibutton' href ='./?action=monProfil' alt ='Ce lient mène vers la page de votre profil'>Profil</a></td>
        <?php } else { ?>
        <td class = 'table_cell'> <a class = 'navibutton' href ='./?action=connexion' alt ='Ce lien mène vers la page de connexion'>Connexion</a></td> 
        <?php } ?>
    </table>
</div>
<script type= 'text/javascript' src='../model/header.js'></script>


