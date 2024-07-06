<div class="container-updVideo">
    <?php if (!empty($message)): ?>
        <p class="success-message"><?php echo $message; ?></p>
    <?php endif; ?>

    <h1>Modifier la Vidéo</h1>
    <div class="separator-line"></div>
    <form action="./?action=updVideo&id=<?php echo $id; ?>" method="POST">
        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($video['titre']); ?>"><br><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description"><?php echo htmlspecialchars($video['description']); ?></textarea><br><br>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
