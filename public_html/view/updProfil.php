
<div class="modifier">
    <?php if (!empty($message)): ?>
        <p class="success-message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="./?action=updProfil" method="POST">

    <h3>Mettre à jour mon Prenom :</h3>
    <input type="text" name="prenom" class="input-upd" placeholder="Nouveau prenom"/><br />

    <h3>Mettre à jour mon Nom : </h3>
    <input type="text" name="nom" class="input-upd" placeholder="Nouveau Nom" /><br />

    <h3>Mettre à jour mon Pseudo : </h3>
    <input type="text" name="pseudo" class="input-upd" placeholder="Nouveau pseudo" /><br />

    <H3> Mettre à jour mon mot de passe :</H3>
    <input type="password" name="mdp" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mdp2" placeholder="Confirmer la saisie" /><br />
    <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    </div>
