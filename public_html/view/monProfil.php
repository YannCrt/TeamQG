<br>
<br>
<div class="bgblue-Profil">
<div class="container-profil">
    <div class="text-center">
        <img src="photos/user.jpg" width="100" class="rounded-circle">
    </div>
    <div class="text-center">
        <h5 class="mt-2 mb-0">Mon Profil</h5>
        <ul class="social-list">
            <li></i>Nom d'utilisateurs : <?= htmlspecialchars($util["pseudo"]) ?></li>
            <li></i>Mail : <?= htmlspecialchars($util["mail"]) ?></li>
            <li></i>Nom : <?= htmlspecialchars($util["nom"]) ?></li>
            <li></i>Prenom : <?= htmlspecialchars($util["prenom"]) ?></li>
        </ul>
        <div class="button-container">
        <button class="btn btn-primary btn-profil" id="modifier"><a href="./?action=updProfil">Modifier</a></button>
        <button class="btn btn-primary btn-profil" id="sup"><a href="./?action=suppression">Supprimer</a></button>
        <button class="btn btn-primary btn-profil" id="deco"><a href="./?action=deconnexion">Déconnexion</a></button>
        <button class="btn btn-primary btn-profil" id="mesvideos"><a href="./?action=video">Vidéos</a></button>
        </div>
    </div>
</div>
