document.addEventListener('DOMContentLoaded', () => {
    const cartTrigger = document.getElementById('cart-trigger');
    const cartSidebar = document.getElementById('cart-sidebar');
    const closeSidebar = document.getElementById('close-sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    function openSidebar() {
        cartSidebar.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
    }

    function closeSidebarFunc() {
        cartSidebar.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    if (cartTrigger) cartTrigger.addEventListener('click', openSidebar);
    if (closeSidebar) closeSidebar.addEventListener('click', closeSidebarFunc);
    if (overlay) overlay.addEventListener('click', closeSidebarFunc);
});
