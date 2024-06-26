<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>  
</head>
<body>
<div class="form-wrapper">
        <div class="container">
            <form action="./?action=connexion" method="post">
                <div class="form-group">
                    <label for="pseudo">Nom d'utilisateur</label>
                    <input 
                        type="text" 
                        id="pseudo" 
                        name="pseudo" 
                        autocomplete="off" 
                        class="form-control"
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
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input 
                        type="password" 
                        id="mdp" 
                        name="mdp" 
                        autocomplete="off"
                        class="form-control" 
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
                <div class="login-btn-container">
                <button type="submit" class="btn btn-primary login-btn" id="connexion" name="envoie">Se connecter</button>
                </div>
            </form>
            <div class="signup-btn-container"></div>
            <p>Pas de compte ? <button class="btn btn-primary"><a href="./?action=inscription">S'inscrire</a></button></p>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            ?>
            
    </div>
</body>
</html>