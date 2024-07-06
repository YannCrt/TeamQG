
<div class="addVideo">
<h2>Ajouter une Vidéo</h2>
<div class="separator-line"></div>
<form action="./?action=addVideo" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>
    
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br><br>
    
    <label for="fichier">Fichier vidéo :</label><br>
    <input type="file" id="fichier" name="fichier" accept="video/*" required><br><br>
    
    <input type="hidden" name="datee" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="utilisateur_id" value="<?php echo $util['id']; ?>">

    <input type="submit" name="ajouter_video" class="btn btn-primary" value="Ajouter la vidéo">
</form>
</div>
