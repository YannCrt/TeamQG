<div class="container-profil">
    <div class="text-center">
        <img src="photos/user.jpg" width="100" class="rounded-circle">
    </div>
    <div class="text-center">
        <h5 class="mt-2 mb-0">Mon Profil</h5>
        <ul class="social-list">
            <li><i class="fa fa-facebook"></i>mail : <?= censorEmail($util["mail"]) ?></li>
            <li><i class="fa fa-facebook"></i>nom d'utilisateur : <?= htmlspecialchars($util["pseudo"]) ?></li>
            <li><i class="fa fa-facebook"></i>nom : <?= htmlspecialchars($util["nom"]) ?></li>
            <li><i class="fa fa-facebook"></i>prenom : <?= htmlspecialchars($util["prenom"]) ?></li>
        </ul>
        <div class="button-container">
            <button class="btn btn-primary btn-profil"><a href="./?action=deconnexion">Déconnexion</a></button>
            <button class="btn btn-primary btn-profil"><a href="./?action=updProfil">Modifier</a></button>
            <button class="btn btn-primary btn-profil" id="sup"><a href="./?action=suppression">Supprimer</a></button>
        </div>
    </div>






    <h1>Gestion des Vidéos</h1>

    <!-- Section pour Ajouter une Vidéo -->
    <h2>Ajouter une Vidéo</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" required><br><br>
        
        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>
        
        <label for="fichier">Fichier vidéo :</label><br>
        <input type="file" id="fichier" name="fichier" accept="video/*"><br><br>
        
        <input type="submit" name="ajouter_video" value="Ajouter la vidéo">
    </form>

    <!-- Section pour Afficher les Vidéos -->
    <h2>Liste des Vidéos</h2>
    <?php if (!empty($videos)): ?>
        <ul>
            <?php foreach ($videos as $video): ?>
                <li>
                    <strong><?php echo htmlspecialchars($video['titre']); ?></strong><br>
                    <small><?php echo htmlspecialchars($video['description']); ?></small><br>
                    <!-- Ajoutez d'autres détails de la vidéo si nécessaire -->
                    <form action="" method="POST">
                        <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                        <input type="submit" name="edit_video" value="Modifier">
                        <input type="submit" name="delete_video" value="Supprimer">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune vidéo trouvée.</p>
    <?php endif; ?>

