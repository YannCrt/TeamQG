<!-- vue/vueVideo.php -->
<h1>Gestion des Vidéos</h1>

<!-- Section pour Afficher les Vidéos -->
<h2>Liste des Vidéos</h2>
<?php if (!empty($videos)): ?>
    <ul>
        <?php foreach ($videos as $video): ?>
            <li>
                <strong><?php echo htmlspecialchars($video['titre']); ?></strong><br>
                <small><?php echo htmlspecialchars($video['description']); ?></small><br>
                <!-- Vidéo -->
                <?php if (!empty($video['fichier'])): ?>
                    <video width="320" height="240" controls>
                        <source src="data:video/mp4;base64,<?php echo base64_encode($video['fichier']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
                <!-- Formulaire de suppression -->
                <form action="./?action=suppressionVideo" method="POST">
                    <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                    <button type="submit" class="btn btn-primary btn-profil" name="SupprimerVideo" value="Supprimer">Supprimer</button>
                </form>
                <!-- Lien pour modifier la vidéo -->
                <button class="btn btn-primary btn-profil"><a href="./?action=updVideo&id=<?php echo $video['id']; ?>">Modifier</a></button>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune vidéo trouvée.</p>
<?php endif; ?>
<button class="btn btn-primary btn-profil"><a href="./?action=addVideo">Ajouter une vidéo</a></button>
