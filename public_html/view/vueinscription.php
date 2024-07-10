<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<div class="container-login">
    <?php if (!empty($msg)): ?>
        <p class="error-message"><?php echo $msg; ?></p>
    <?php endif; ?>
    <div class="ring-inscription">
        <i></i>
        <i></i>
        <i></i>
        <div class="login">
            <h2>Inscription</h2>
            <form action="./?action=inscription" method="POST" onsubmit="return validateForm()">
                <div class="inputBx">
                    <input type="text" id="prenom" name="prenom" autocomplete="off" placeholder="Prénom" required>
                </div>
                <br>
                <div class="inputBx">   
                    <input type="text" id="nom"  name="nom" autocomplete="off" placeholder="Nom" required>
                </div>
                <div class="inputBx">
                    <br>
                    <input type="text" id="pseudo" name="pseudo" autocomplete="off" placeholder="Pseudo" required>
                </div>
                <div class="inputBx">
                    <br>
                    <input type="password" id="mdp"  name="mdp" autocomplete="off" placeholder="Mot de passe" required>
                </div>
                <div class="inputBx">
                    <br>
                    <input type="email" id="mail" name="mail" autocomplete="off" placeholder="Email" required>
                </div>
                <div class="inputBx">
                    <input id="inscrire" class="btn register-btn" type="submit" name="envoyer" value="S'inscrire">
                </div>
                <p class="error-message"></p>
            </form>
           
            <div class="links" id="link-inscription">
                <p>Déjà un compte ? <a href="./?action=connexion">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='../model/mdp.js'></script>

</body>
</html>
