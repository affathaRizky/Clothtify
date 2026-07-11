window.pilihSize = function (btn, size) {
    document.querySelectorAll('.size-btn').forEach(function (b) {
        if (b.dataset.habis === '1') return;
        b.classList.remove('border-gray-900', 'bg-gray-900', 'text-white');
        b.classList.add('border-gray-200', 'bg-white', 'text-gray-900');
    });

    btn.classList.remove('border-gray-200', 'bg-white', 'text-gray-900');
    btn.classList.add('border-gray-900', 'bg-gray-900', 'text-white');

    var input = document.getElementById('selected_size');
    if (input) input.value = size;

    var errorEl = document.getElementById('size-error');
    if (errorEl) errorEl.classList.add('hidden');
};
