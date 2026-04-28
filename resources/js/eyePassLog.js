// Eye Pass/Password Visibility Toggle untuk page login
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggle-password');
    const passInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    toggleBtn?.addEventListener('click', () => {
        const type = passInput.type === 'password' ? 'text' : 'password';
        passInput.type = type;
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
});