<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
include_once "$racine/view/head.php"; 
?>

<div class="body">
    <h1 class="h1">Gestion des Vidéos</h1>

    <!-- Formulaire pour sélectionner un utilisateur (uniquement pour les administrateurs) -->
    <?php if (isset($is_admin) && $is_admin): ?>
        <form method="POST" action="" class="selec_util_form">
            <label for="utilisateur_id" class="selec_util">Sélectionner l'utilisateur :</label>
            <select name="utilisateur_id" id="utilisateur_id" onchange="this.form.submit()" class="selec_util">
                <?php foreach ($utilisateurs as $user): ?>
                    <option value="<?php echo $user['id']; ?>" <?php echo (isset($selected_user_id) && $selected_user_id == $user['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($user['pseudo']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <!-- Formulaire de recherche par pseudo -->
        <div class="center-container">
        <form method="POST" action="" class="search_pseudo_form">
            <label for="search_pseudo" class="search_pseudo">Rechercher par pseudo :</label>
            <input type="text" name="search_pseudo" id="search_pseudo" value="<?php echo htmlspecialchars($search_pseudo); ?>">
            <button type="submit" class="btn btn-primary search_pseudo">Rechercher</button>
        </form>
    </div>
    <?php endif; ?>

    <!-- Section pour Afficher les Vidéos -->
<h2 class="h2">Liste des Vidéos</h2>
<ul class="ul">
<?php if (!empty($videos)): ?>
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
            <?php if (isset($is_admin) && $is_admin): ?>
                <div class="btn-video-group">
                <!-- Formulaire de suppression -->
                <form action="./?action=suppressionVideo" method="POST">
                    <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                    <button type="submit" class="btn-video-inline" name="SupprimerVideo" value="Supprimer">Supprimer</button>
                </form>
                <!-- Lien pour modifier la vidéo -->
                <button class="btn-video-inline"><a href="./?action=updVideo&id=<?php echo $video['id']; ?>">Modifier</a></button>
            
            <?php endif; ?>
            <button class="btn-video-inline"><a href="data:video/mp4;base64,<?php echo base64_encode($video['fichier']); ?>" download="<?php echo htmlspecialchars($video['titre']); ?>.mp4">Télécharger</a></button>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

    <?php else: ?>
        <p class="novideo">Aucune vidéo trouvée.</p>
    <?php endif; ?>
 
</div>
    <?php if (isset($is_admin) && $is_admin): ?>
        <div class="btn-addvideo-container">
        <button class="btn btn-primary btn-addvideo">
            <a href="./?action=addVideo">Ajouter une vidéo</a>
        </button>
    </div>
        <?php endif; ?>    
