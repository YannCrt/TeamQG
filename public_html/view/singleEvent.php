<div class="event">
    <h2><?php echo htmlspecialchars($event['nom']); ?></h2>
    <p>Date: <?php echo htmlspecialchars($event['date_event']); ?></p>
    <p>Lieu: <?php echo htmlspecialchars($event['lieu']); ?></p>
    <p>Description: <?php echo htmlspecialchars($event['description']); ?></p>
    <img src="<?php echo htmlspecialchars($event['image_path']); ?>" alt="Image de l'événement">

    <?php if (isLoggedOn()): ?>
        <form action="controller/events.php" method="GET">
            <input type="hidden" name="action" value="inscription_event">
            <input type="hidden" name="event_id" value="<?php echo $event['idEvent']; ?>">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    <?php else: ?>
        <button class="btn btn-primary"><a href="./?action=connexion" class="button">Se connecter pour s'inscrire</a></button>
    <?php endif; ?>
</div>