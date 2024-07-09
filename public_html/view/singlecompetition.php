<div class="event">
    <h2><?php echo htmlspecialchars($competition['nomcompetition']); ?></h2>
    <p>Date: <?php echo htmlspecialchars($competition['datecompetition']); ?></p>
    <p>Lieu: <?php echo htmlspecialchars($competition['lieu']); ?></p>
    <p>Description: <?php echo htmlspecialchars($competition['description']); ?></p>
    <p>informations: <?php echo htmlspecialchars($competition['informations']); ?></p>

    <?php if (isLoggedOn()): ?>
        <form action="controller/competitions.php" method="GET">
            <input type="hidden" name="action" value="inscription_competition">
            <input type="hidden" name="competition_id" value="<?php echo $competition['idCompetition']; ?>">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    <?php else: ?>
        <button class="btn btn-primary"><a href="./?action=connexion" class="button">Se connecter pour s'inscrire</a></button>
    <?php endif; ?>
</div>