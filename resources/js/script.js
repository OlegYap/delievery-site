const signInButton = document.querySelector('.signin-btn');
const signUpButton = document.querySelector('.signup-btn');
const formBox = document.querySelector('.form-box');

signInButton.addEventListener('click', function () {
    formBox.classList.add('active');
})
signUpButton.addEventListener('click', function () {
    formBox.classList.remove('active');
})
