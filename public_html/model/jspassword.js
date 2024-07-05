document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const passwordInput = document.getElementById('mdp');
    const errorMessage = document.createElement('p');
    errorMessage.classList.add('error-message');
    errorMessage.style.color = 'red';
    
    form.addEventListener('submit', function(event) {
        const password = passwordInput.value;
        const strongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        
        if (!strongPassword.test(password)) {
            event.preventDefault();
            errorMessage.textContent = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.';
            form.insertBefore(errorMessage, form.firstChild);
        } else {
            if (errorMessage.parentNode) {
                errorMessage.parentNode.removeChild(errorMessage);
            }
        }
    });
});
