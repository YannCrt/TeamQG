<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/view/head.php"; 
include_once "$racine/model/authentification.php";
include_once "$racine/model/utilisateurs.php";

$is_admin = false;
$utilisateurs = getUtilisateurs(); // Assurez-vous que cette fonction récupère tous les utilisateurs

// Vérifier si l'utilisateur est connecté et administrateur
if (isLoggedOn()) {
    $pseudo = getPseudoLoggedOn();
    $utilisateur = getUtilisateurByPseudo($pseudo);
    
    if ($utilisateur && estAdmin($utilisateur['id'])) {
        $is_admin = true;
    }
}
?>
<div class="addVideo">
    <h2>Ajouter une Vidéo</h2>
    <div class="separator-line"></div>
    <form action="./controller/addvideo.php" method="POST" enctype="multipart/form-data">
        <?php if ($is_admin) { ?>
            <label for="utilisateur_id">Sélectionner l'utilisateur :</label>
            <select name="utilisateur_id" id="utilisateur_id">
                <?php foreach ($utilisateurs as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['pseudo']); ?></option>
                <?php endforeach; ?>
            </select><br>
        <?php } else { ?>
            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
        <?php } ?>
        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" required><br><br>
        
        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>
        
        <label for="fichier">Fichier vidéo :</label><br>
        <input type="file" id="fichier" name="fichier" accept="video/*" required><br><br>
        
        <input type="hidden" name="datee" value="<?php echo date('Y-m-d'); ?>">
        
        <input type="submit" name="ajouter_video" class="btn btn-primary" value="Ajouter la vidéo">
    </form>
</div>
