<div class="container-profil">
    <div class="text-center">
        <img src="photos/user.jpg" width="100" class="rounded-circle">
    </div>
    <div class="text-center">
        <h5 class="mt-2 mb-0">Mon Profil</h5>
        <ul class="social-list">
            <li></i>pseudo : <?= htmlspecialchars($util["pseudo"]) ?></li>
            <li></i>mail : <?= htmlspecialchars($util["mail"]) ?></li>
            <li></i>nom d'utilisateur : <?= htmlspecialchars($util["pseudo"]) ?></li>
            <li></i>nom : <?= htmlspecialchars($util["nom"]) ?></li>
            <li></i>prenom : <?= htmlspecialchars($util["prenom"]) ?></li>
        </ul>
        <div class="button-container">
            <button class="btn btn-primary btn-profil"><a href="./?action=deconnexion">Déconnexion</a></button>
            <button class="btn btn-primary btn-profil" id="modifier"><a href="./?action=updProfil">Modifier</a></button>
            <button class="btn btn-primary btn-profil" id="sup"><a href="./?action=suppression">Supprimer</a></button>
            <button class="btn btn-primary btn-profil"><a href="./?action=video">Mes vidéos</a></button>
        </div>
    </div>

    
