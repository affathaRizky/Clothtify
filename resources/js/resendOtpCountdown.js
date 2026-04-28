// Hitung Mundur untuk Resend OTP
document.addEventListener('DOMContentLoaded', () => {
    const resendBtn = document.getElementById('resend-btn');
    const countdownText = document.getElementById('countdown-text');
    const timerSpan = document.getElementById('timer');
    let countdown;

    resendBtn?.addEventListener('click', () => {
        resendBtn.disabled = true;
        countdownText.classList.remove('hidden');
        let timeLeft = 60;
        timerSpan.textContent = timeLeft;

        countdown = setInterval(() => {
            timeLeft--;
            timerSpan.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(countdown);
                resendBtn.disabled = false;
                countdownText.classList.add('hidden');
                alert('Kode OTP baru telah dikirim ke email Anda!');
            }
        }, 1000);

        console.log('OTP resend requested...');
    });
});