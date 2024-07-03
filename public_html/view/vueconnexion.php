<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br>
<br>
<div class="form-wrapper">
    <div class="container-login">
        <div class="ring">
            <i></i>
            <i></i>
            <i></i>
            <div class="login">
                <h2>Connexion</h2>
                <form action="./?action=connexion" method="post">
                    <div class="inputBx">
                        <input 
                            type="text" 
                            id="pseudo" 
                            name="pseudo" 
                            autocomplete="off" 
                            placeholder="Nom d'utilisateur" 
                            required
                        >
                        <?php
                        if (isset($_SESSION['pseudo_error'])) {
                            echo '<p class="error">' . $_SESSION['pseudo_error'] . '</p>';
                            unset($_SESSION['pseudo_error']);
                        }
                        ?>
                    </div>
                    <br>
                    <div class="inputBx">
                        <input 
                            type="password" 
                            id="mdp" 
                            name="mdp" 
                            autocomplete="off"
                            placeholder="Mot de passe" 
                            required
                        >
                        <?php
                        if (isset($_SESSION['mdp_error'])) {
                            echo '<p class="error">' . $_SESSION['mdp_error'] . '</p>';
                            unset($_SESSION['mdp_error']);
                        }
                        ?>
                    </div>
                    <div class="inputBx">
                        <input type="submit" class="btn login-btn" id="connexion" name="envoie" value="Se connecter">
                    </div>
                </form>
                <div class="links">
                    <p>Pas de compte ? <a href="./?action=inscription">S'inscrire</a></p>
                </div>
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
