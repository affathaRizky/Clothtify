document.addEventListener('DOMContentLoaded', () => {
    const userBtn = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');
    if (userBtn && userDropdown) {
        userBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });
        document.addEventListener('click', (e) => {
            if (!userDropdown.contains(e.target) && e.target !== userBtn) {
                userDropdown.classList.add('hidden');
            }
        });
    }
});