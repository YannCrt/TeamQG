<!-- Autres contenus de votre page -->

    <div class="confirmation-suppression">
        <h2>Êtes-vous sûr de vouloir supprimer ?</h2>
        <div class="container-suppression">
            <form action="./?action=suppression" method="POST">
                <input type="hidden" name="pseudo" id="pseudo" value="<?= isset($pseudo) ? htmlspecialchars($pseudo) : '' ?>">
                <button type="submit" class="btn-oui" id="Oui" value="Supprimer">Oui</button>
            </form>
            <button type="submit" class="btn-non"><a href="./?action=monProfil">Non</a></button>
        </div>
    </div>
