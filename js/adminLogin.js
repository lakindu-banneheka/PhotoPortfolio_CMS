document.getElementById('loginForm').addEventListener('submit', function(event) {
    let isValid = true;
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const serverError = document.getElementById('serverError');

    usernameError.textContent = '';
    passwordError.textContent = '';
    serverError.textContent = '';

    if (username === '') {
        usernameError.textContent = 'Username is required';
        isValid = false;
    }

    if (password === '') {
        passwordError.textContent = 'Password is required';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});
