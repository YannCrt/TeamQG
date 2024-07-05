<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <div class="inputBx password-container">
                        <input 
                            type="password" 
                            id="mdp" 
                            name="mdp" 
                            autocomplete="off"
                            placeholder="Mot de passe" 
                            required
                        >
                        <button type="button" id="togglePassword">
                            <span class="fas fa-eye eye-icon"></span>
                        </button>
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

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#mdp');

    togglePassword.addEventListener('click', function () {
        // Basculer l'attribut type
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Basculer l'icône de l'œil
        this.querySelector('span').classList.toggle('fa-eye');
        this.querySelector('span').classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
