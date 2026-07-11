var provinsiSelect = document.querySelector('#filterForm select[name="provinsi_id"]');
var kotaSelect = document.querySelector('#filterForm select[name="kota_id"]');
var kecamatanSelect = document.querySelector('#filterForm select[name="kecamatan_id"]');

if (provinsiSelect) {
    provinsiSelect.addEventListener('change', function () {
        var hidden = document.querySelector('#addressForm input[name="provinsi_id"]');
        if (hidden) hidden.value = this.value;
    });
}

if (kotaSelect) {
    kotaSelect.addEventListener('change', function () {
        var hidden = document.querySelector('#addressForm input[name="kota_id"]');
        if (hidden) hidden.value = this.value;
    });
}

if (kecamatanSelect) {
    kecamatanSelect.addEventListener('change', function () {
        var hidden = document.querySelector('#addressForm input[name="kecamatan_id"]');
        if (hidden) hidden.value = this.value;
    });
}

function selectShipping(value, label) {
    document.getElementById('selected_shipping').value = value;
    document.getElementById('shipping_label').textContent = label;
    var modal = FlowbiteInstances.getInstance('Modal', 'shippingModal');
    if (modal) modal.hide();
}

function selectPayment(value, label) {
    document.getElementById('selected_payment').value = value;
    document.getElementById('payment_label').textContent = label;
    var modal = FlowbiteInstances.getInstance('Modal', 'paymentModal');
    if (modal) modal.hide();
}