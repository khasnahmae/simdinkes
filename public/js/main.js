
const adminModal = document.getElementById('admin-access-modal');
const feedbackModal = document.getElementById('feedback-form-modal');
const openAdminModalButton = document.getElementById('open-admin-modal');
const closeAdminModalButton = document.getElementById('close-admin-modal');
const closeFeedbackModalButton = document.getElementById('close-feedback-form');
const validateButton = document.getElementById('validate-admin-code');
const adminCodeInput = document.getElementById('admin-code');

// Kode rahasia admin
const adminSecretCode = 't3g4lB4har1';

// Fungsi untuk menampilkan modal
function showModal(modal) {
    modal.style.display = 'block';
}

// Fungsi untuk menyembunyikan modal
function hideModal(modal) {
    modal.style.display = 'none';
}

// Fungsi untuk mereset formulir penilaian
function resetFeedbackForm() {
    // Reset input bintang
    document.querySelectorAll('.rating').forEach((rating) => {
        rating.querySelectorAll('span').forEach((star) => {
            star.classList.remove('selected');
        });
    });

    // Reset input tersembunyi
    document.getElementById('kepuasan-hidden').value = '';
    document.getElementById('kecepatan-hidden').value = '';
    document.getElementById('kerapihan-hidden').value = '';

    // Reset input nama dan nomor telepon
    document.querySelector('input[name="nama"]').value = '';
    document.querySelector('input[name="deskripsi"]').value = '';
    document.querySelector('input[name="telepon"]').value = '';
}

// Buka modal validasi kode admin saat tombol ikon diklik
openAdminModalButton.addEventListener('click', () => {
    showModal(adminModal);
});

// Tutup modal validasi kode admin
closeAdminModalButton.addEventListener('click', () => {
    hideModal(adminModal);
    adminCodeInput.value = ''; // Reset input kode validasi
});

// Validasi kode admin
validateButton.addEventListener('click', () => {
    const inputCode = adminCodeInput.value;

    if (inputCode === adminSecretCode) {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Kode valid! Silakan beri penilaian.',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(() => {
            hideModal(adminModal); // Tutup modal validasi kode admin
            showModal(feedbackModal); // Tampilkan modal input penilaian
            resetFeedbackForm(); // Reset formulir penilaian
            adminCodeInput.value = ''; // Reset input kode validasi
        });
    } else {
        Swal.fire({
            title: 'Gagal!',
            text: 'Kode salah! Coba lagi.',
            icon: 'error',
            confirmButtonText: 'OK',
        }).then(() => {
            adminCodeInput.value = ''; // Reset input kode validasi
        });
    }
});

// Tutup modal saat klik di luar konten
window.addEventListener('click', (e) => {
    if (e.target === adminModal) {
        hideModal(adminModal);
        adminCodeInput.value = ''; // Reset input kode validasi
    }
    if (e.target === feedbackModal) {
        hideModal(feedbackModal);
        resetFeedbackForm(); // Reset formulir penilaian
    }
});

// Tutup modal input penilaian
closeFeedbackModalButton.addEventListener('click', () => {
    hideModal(feedbackModal);
    resetFeedbackForm(); // Reset form saat modal ditutup
});
// Tangani rating
document.querySelectorAll('.rating').forEach((rating) => {
    const emojis = rating.querySelectorAll('span');
    const aspect = rating.getAttribute('data-aspect');
    const hiddenInput = document.getElementById(`${aspect}-hidden`);

    emojis.forEach((emoji) => {
        emoji.addEventListener('click', () => {
            const value = emoji.getAttribute('data-value');
            hiddenInput.value = value;

            // Reset semua emoji
            emojis.forEach((e) => e.classList.remove('selected'));

            // Tandai hanya emoji yang dipilih
            emoji.classList.add('selected');
        });
    });
});

// Tangani pengiriman formulir
document.getElementById('feedback-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah pengiriman form secara default

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'),
            },
            body: formData,
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Gagal mengirim data. Periksa kembali input Anda.');
            }
            return response.json();
        })
        .then((data) => {
            // Tutup modal
            hideModal(feedbackModal);

            // Reset formulir
            resetFeedbackForm();

            // Tampilkan notifikasi pop-up
            Swal.fire({
                title: 'Berhasil!',
                text: data.message || 'Feedback berhasil dikirim!',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        })
        .catch((error) => {
            // Tampilkan pesan error
            Swal.fire({
                title: 'Gagal!',
                text: error.message || 'Terjadi kesalahan. Coba lagi nanti.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        });
});

// Error Popup
document.addEventListener("DOMContentLoaded", function () {
    let popup = document.getElementById("errorPopup");

    // Jika popup ada, tampilkan setelah halaman dimuat
    if (popup) {
        popup.style.display = "block";

        // Auto close popup setelah 5 detik
        setTimeout(closePopup, 5000);
    }
});

function closePopupError() {
    let popup = document.getElementById("errorPopup");
    if (popup) {
        popup.style.display = "none";
    }
}

//Success Popup
function closePopup() {
    const popupWrapper = document.querySelector('.popup-wrapper');
    if (popupWrapper) {
        popupWrapper.style.display = 'none';
    }
}

// Sembunyikan pop-up secara otomatis setelah 3 detik
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        const popupWrapper = document.querySelector('.popup-wrapper');
        if (popupWrapper) {
            popupWrapper.style.display = 'none';
        }
    }, 3000); // 3000 ms = 3 detik
});


// Fungsi untuk deteksi perangkat mobile
function isMobile() {
return /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
}

// Mekanisme untuk desktop
document.addEventListener('keydown', function(event) {
if (event.ctrlKey && event.altKey && event.key === 'h') {
    if (!isMobile()) {
        document.getElementById('open-admin-modal').style.display = 'inline-block';
    }
}
});

// Mekanisme untuk mobile
if (isMobile()) {
let lastTap = 0;

document.addEventListener('touchend', function(event) {
    const currentTime = new Date().getTime();
    const tapGap = currentTime - lastTap;

    if (tapGap < 300 && tapGap > 0) {
        document.getElementById('open-admin-modal').style.display = 'inline-block';
    }

    lastTap = currentTime;
});
}

document.addEventListener("DOMContentLoaded", function () {
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href").substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 70, // Sesuaikan jarak dari atas
                behavior: "smooth"
            });
        }
    });
});
});





