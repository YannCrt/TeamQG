<!-- Autres contenus de votre page -->
<div class="container-profil">
<div class="confirmation-content">
    <h2>Êtes-vous sûr de vouloir supprimer ?</h2>
    <div class="button-container">
    <form action="./?action=suppression" method="POST">
        <input type="hidden" name="pseudo" id="pseudo" value="<?= isset($pseudo) ? htmlspecialchars($pseudo) : '' ?>">
        <button type="submit" class="btn btn-primary btn-profil" id="Oui" value="Supprimer">Oui</button>
    </form>
        <button type="submit" class="btn btn-primary btn-profil" id="Non"><a href="./?action=monProfil">Non</a></button>
    </div>
</div>
</div>
