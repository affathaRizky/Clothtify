window.selectShipping = function (value, label) {
    document.getElementById('selected_shipping').value = value;
    document.getElementById('shipping_label').textContent = label;

    const modal = FlowbiteInstances.getInstance('Modal', 'shippingModal');
    if (modal) modal.hide();
};

window.selectPayment = function (value, label) {
    document.getElementById('selected_payment').value = value;
    document.getElementById('payment_label').textContent = label;

    const modal = FlowbiteInstances.getInstance('Modal', 'paymentModal');
    if (modal) modal.hide();
};