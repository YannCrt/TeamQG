function validateForm() {
    const mdp = document.getElementById("mdp").value;
    const errorMessage = document.querySelector('.error-message');
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    if (!regex.test(mdp)) {
        errorMessage.textContent = "Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.";
        return false;
    }
    return true;
}
