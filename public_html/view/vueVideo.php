<div class="body">
    <h1 class="h1">Gestion des Vidéos</h1>

    <!-- Section pour Afficher les Vidéos -->
    <h2 class="h2">Liste des Vidéos</h2>
    <?php if (!empty($videos)): ?>
        <ul class="ul">
    <?php foreach ($videos as $video): ?>
        <li class="li">
            <strong class="titre"><?php echo 'titre : '. htmlspecialchars($video['titre']); ?></strong><br>
            <small class="description"><?php echo 'description : '. htmlspecialchars($video['description']); ?></small><br>
            <!-- Vidéo -->
            <?php if (!empty($video['fichier'])): ?>
                <video class="video" controls>
                    <source src="data:video/mp4;base64,<?php echo base64_encode($video['fichier']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
            <div class="btn-videos">
                <!-- Formulaire de suppression -->
                <form action="./?action=suppressionVideo" method="POST">
                    <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                    <button type="submit" class="btn btn-primary btn-video" name="SupprimerVideo" value="Supprimer">Supprimer</button>
                </form>
                <!-- Lien pour modifier la vidéo -->
                <button class="btn btn-primary btn-video"><a href="./?action=updVideo&id=<?php echo $video['id']; ?>">Modifier</a></button>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
    <?php else: ?>
        <p class="novideo">Aucune vidéo trouvée.</p>
    <?php endif; ?>
    <button class="btn btn-primary btn-addvideo"><a href="./?action=addVideo">Ajouter une vidéo</a></button>
</div>
