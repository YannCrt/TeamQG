<div class="event">
    <h2><?php echo htmlspecialchars($event['nom']); ?></h2>
    <p>Date: <?php echo htmlspecialchars($event['date_event']); ?></p>
    <p>Lieu: <?php echo htmlspecialchars($event['lieu']); ?></p>
    <p>Description: <?php echo htmlspecialchars($event['description']); ?></p>
    <img src="<?php echo htmlspecialchars($event['image_path']); ?>" alt="Image de l'événement">

    <?php if (isLoggedOn()): ?>
        <?php 
        // Vérifier si l'utilisateur est inscrit à l'événement
        $utilisateur = getPseudoLoggedOn();
        $user = getUtilisateurByPseudo($utilisateur);
        $user_id = $user['id'];
        $isRegistered = isUserRegisteredToEvent($event['idEvent'], $user_id);
        ?>
        <?php if ($isRegistered): ?>
            <form action="./?action=desinscriptionevent" method="POST">
                <input type="hidden" name="action" value="desinscription_event">
                <input type="hidden" name="event_id" value="<?php echo $event['idEvent']; ?>">
                <button type="submit" class="btn btn-secondary">Se désinscrire</button>
            </form>
        <?php else: ?>
            <form action="./?action=inscriptionevent" method="POST">
                <input type="hidden" name="action" value="inscription_event">
                <input type="hidden" name="event_id" value="<?php echo $event['idEvent']; ?>">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        <?php endif; ?>
    <?php else: ?>
        <button class="btn btn-primary"><a href="./?action=connexion" class="button">Se connecter pour s'inscrire</a></button>
    <?php endif; ?>
</div>
