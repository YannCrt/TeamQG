<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/home.css">
        <link rel="stylesheet" href="style/credits.css">
        <link rel="stylesheet" href="style/competitions.css">
        <link rel="stylesheet" href="style/events.css">
    <title>Inscription</title>
</head>
<body>

    <div class="container-inscription">
        <?php if (!empty($msg)): ?>
            <p class="error-message"><?php echo $msg; ?></p>
        <?php endif; ?>
        <form action="./?action=inscription" method="POST">
            <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom"  class="form-control" name="prenom" autocomplete="off" placeholder="Prénom" required>
            </div>
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom"  class="form-control" name="nom" autocomplete="off" placeholder="Nom" required>
            </div>
            <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo"  class="form-control" name="pseudo" autocomplete="off" placeholder="Pseudo" required>
            </div>
            <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp"  class="form-control" name="mdp" autocomplete="off" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" id="mail"  class="form-control" name="mail" autocomplete="off" placeholder="Email" required>
            </div>
            <input class="btn btn-primary btn-inscription" type="submit" id="inscription" name="envoie" value="S'inscrire">
        </form>
    </div>

    <?php if(isset($_POST['envoie'])) {
        var_dump($_POST);
    } ?>
</body>
</html>
