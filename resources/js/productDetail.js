document.addEventListener('DOMContentLoaded', function () {

    // 🎨 Color & Size: Fungsi sama, tinggal panggil
    function aktifkanTombol(selector) {
        var btn = document.querySelectorAll(selector);
        for (var i = 0; i < btn.length; i++) {
            btn[i].onclick = function () {
                for (var j = 0; j < btn.length; j++) {
                    btn[j].classList.remove('active', 'bg-gray-900', 'text-white', 'border-gray-900');
                    btn[j].classList.add('bg-white', 'text-gray-700', 'border-gray-300');
                }
                this.classList.add('active', 'bg-gray-900', 'text-white', 'border-gray-900');
                this.classList.remove('bg-white', 'text-gray-700', 'border-gray-300');
            }
        }
    }
    aktifkanTombol('.color-btn');
    aktifkanTombol('.size-btn');

    // Quantity Selector 
    var qIn = document.getElementById('jumlah_produk');
    var qMin = document.getElementById('qty-minus');
    var qPlus = document.getElementById('qty-plus');

    function ubahQty(angka) {
        if (angka < 1) angka = 1;
        if (angka > 99) angka = 99;
        qIn.value = angka;
    }
    if (qMin) qMin.onclick = function () {
        ubahQty(parseInt(qIn.value) - 1);
    }
    if (qPlus) qPlus.onclick = function () {
        ubahQty(parseInt(qIn.value) + 1);
    }
    if (qIn) qIn.oninput = function () {
        ubahQty(this.value);
    }

    // Ganti Gambar SubImage
    var mainImg = document.getElementById('main-image');
    var thumbs = document.querySelectorAll('.thumb-btn');
    for (var i = 0; i < thumbs.length; i++) {
        thumbs[i].onclick = function () {
            if (mainImg.src === this.dataset.src) return;
            mainImg.style.opacity = 0;
            var self = this;
            setTimeout(function () {
                mainImg.src = self.dataset.src;
                mainImg.onload = function () {
                    mainImg.style.opacity = 1;
                }
            }, 150);
            for (var j = 0; j < thumbs.length; j++) {
                thumbs[j].classList.toggle('border-gray-900', thumbs[j] === self);
                thumbs[j].classList.toggle('border-gray-200', thumbs[j] !== self);
            }
        }
    }
});