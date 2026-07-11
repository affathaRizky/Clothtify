function openDetailModal(order) {
    // Populate basic info
    document.getElementById('modalOrderId').textContent = order.id_pemesanan;
    document.getElementById('modalCustomer').textContent = order.pembeli?.username || '-';
    document.getElementById('modalDate').textContent = order.tanggal;
    document.getElementById('modalTotal').textContent = 'Rp ' + Number(order.total_harga).toLocaleString('id-ID');

    // Status badge
    var statusEl = document.getElementById('modalStatus');
    var statusMap = {
        pending: { text: 'Pending', cls: 'bg-yellow-100 text-yellow-700' },
        processed: { text: 'Processed', cls: 'bg-blue-100 text-blue-700' },
        completed: { text: 'Completed', cls: 'bg-green-100 text-green-700' },
        denied: { text: 'Denied', cls: 'bg-red-100 text-red-700' }
    };
    var s = statusMap[order.status] || { text: order.status, cls: 'bg-gray-100 text-gray-700' };
    statusEl.textContent = s.text;
    statusEl.className = 'inline-block px-2 py-0.5 text-xs font-bold rounded-full ' + s.cls;

    // Payment & Address from first detail item
    var firstDetail = order.detail_pemesanan?.[0];
    document.getElementById('modalPayment').textContent = firstDetail?.metode_pembayaran || '-';
    document.getElementById('modalBuyerName').textContent = firstDetail?.nama_pembeli || '-';
    document.getElementById('modalAddress').textContent = firstDetail?.detail_alamat || '-';

    // Order items
    var itemsContainer = document.getElementById('modalItems');
    itemsContainer.innerHTML = '';
    if (order.detail_pemesanan && order.detail_pemesanan.length > 0) {
        order.detail_pemesanan.forEach(function (item) {
            var productName = item.produk?.nama_produk || 'Product not found';
            var productImage = item.produk?.foto_produk
                ? '/storage/' + item.produk.foto_produk
                : 'https://placehold.co/50x50/e2e8f0/64748b?text=IMG';
            var subtotal = 'Rp ' + Number(item.subtotal).toLocaleString('id-ID');

            var html = '<div class="flex gap-3 items-center py-2 border-b border-gray-100 last:border-0">' +
                '<img src="' + productImage + '" class="w-12 h-12 object-cover rounded-lg border border-gray-200 flex-shrink-0">' +
                '<div class="flex-1 min-w-0">' +
                '<p class="text-sm font-medium text-gray-900 truncate">' + productName + '</p>' +
                '<p class="text-xs text-gray-500">Size: ' + (item.size_produk || '-').toUpperCase() + ' × ' + item.jumlah_produk + '</p>' +
                '</div>' +
                '<p class="text-sm font-semibold text-gray-900 whitespace-nowrap">' + subtotal + '</p>' +
                '</div>';
            itemsContainer.innerHTML += html;
        });
    } else {
        itemsContainer.innerHTML = '<p class="text-sm text-gray-400">No items found.</p>';
    }

    // Payment proof
    var proofSection = document.getElementById('modalProofSection');
    if (order.bukti_pembayaran) {
        proofSection.classList.remove('hidden');
        document.getElementById('modalProofLink').href = '/storage/' + order.bukti_pembayaran;
    } else {
        proofSection.classList.add('hidden');
    }

    // Show modal
    document.getElementById('orderDetailModal').classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('orderDetailModal').classList.add('hidden');
}

// Close on Escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeDetailModal();
});