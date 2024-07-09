<div class="compet">
    <h2><?php echo htmlspecialchars($competition['nomcompetition']); ?></h2>
    <p>Date: <?php echo htmlspecialchars($competition['datecompetition']); ?></p>
    <p>Lieu: <?php echo htmlspecialchars($competition['lieu']); ?></p>
    <p>Description: <?php echo htmlspecialchars($competition['description']); ?></p>
    <p>Informations: <?php echo htmlspecialchars($competition['informations']); ?></p>

    <?php if (isLoggedOn()): ?>
        <?php 
            $utilisateur = getPseudoLoggedOn();
            $user = getUtilisateurByPseudo($utilisateur);
            $user_id = $user['id'];
            $isRegistered = isUserRegisteredToCompetition($competition['idCompetition'], $user_id);
        ?>
        <?php if ($isRegistered): ?>
            <form action="./?action=desinscriptioncompetition" method="POST">
                <input type="hidden" name="competition_id" value="<?php echo htmlspecialchars($competition['idCompetition']); ?>">
                <button type="submit" class="btn btn-secondary">Se désinscrire</button>
            </form>
        <?php else: ?>
            <form action="./?action=inscriptioncompetition" method="POST">
                <input type="hidden" name="competition_id" value="<?php echo htmlspecialchars($competition['idCompetition']); ?>">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        <?php endif; ?>
    <?php else: ?>
        <button class="btn btn-primary"><a href="./?action=connexion" class="button">Se connecter pour s'inscrire</a></button>
    <?php endif; ?>
</div>
