document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('form[action$="login"]');
    const registerForm = document.querySelector('form[action$="register"]');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            // Add custom validation or submission logic here
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            // Add custom validation or submission logic here
        });
    }
});