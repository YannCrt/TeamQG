<h2>Ajouter une Vidéo</h2>
<form action="./?action=addVideo" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>
    
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br><br>
    
    <label for="fichier">Fichier vidéo :</label><br>
    <input type="file" id="fichier" name="fichier" accept="video/*" required><br><br>
    
    <label for="date">Date :</label><br>
    <input type="date" id="date" name="date" required><br><br>

    <input type="submit" name="ajouter_video" value="Ajouter la vidéo">
</form>
