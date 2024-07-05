<h2>Ajouter une Vidéo</h2>
<form action="./?action=addVideo" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>
    
    <label for="description">Description :</label>
    <textarea id="description" name="description"></textarea>
    
    <label for="fichier">Fichier vidéo :</label>
    <input type="file" id="fichier" name="fichier" accept="video/*" required>
    
    <input type="hidden" name="datee" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="utilisateur_id" value="<?php echo $util['id']; ?>">
    
    <button type="submit" name="ajouter_video">Ajouter Vidéo</button>
</form>
