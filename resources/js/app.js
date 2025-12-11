import './bootstrap';
import '../css/app.css'; 
import introJs from 'intro.js';
import 'intro.js/introjs.css';

document.addEventListener("DOMContentLoaded", function () {

    // Route yang tidak boleh memunculkan intro
    const disabledRoutes = [
        '/pelamar/profile',
        '/pelamar/form/alamat',
        '/pelamar/edit/alamat',
        '/pelamar/alamat'
    ];

    const currentPath = window.location.pathname;
    const isDisabled = disabledRoutes.some(route => currentPath.startsWith(route));
    if (isDisabled) return;

    const shouldShowIntro = document.querySelector('meta[name="show-intro"]');
    if (!shouldShowIntro) return;

    const btnMenu = document.querySelector('#pi');
    const linkProfil = document.querySelector('#profile-link');
    const dropdown = document.getElementById('user-dropdown');

    if (!btnMenu || !linkProfil || !dropdown) return;

    dropdown.classList.add('hidden');

    setTimeout(() => {

        let intro = introJs();
        intro.setOptions({
            steps: [
                {
                    element: '#pi',
                    intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="/images/Lengkapi Profile.jpg" style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                    position: 'left',
                    tooltipClass: 'notif-profil',
                    disableInteraction: true
                },
                {
                    element: '#profile-link',
                    intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="/images/klik3.png" style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                    position: 'right',
                    tooltipClass: 'notif-profil',
                    disableInteraction: true
                }
            ],
            showButtons: false,
            showBullets: false,
            showProgress: false,
            exitOnOverlayClick: false,
            showStepNumbers: false
        });

         // =============== FIX UTAMA ==================
        // Cek apakah dropdown berhasil tampil
        function checkDropdownOrRestart() {
            setTimeout(() => {
                const isVisible = !dropdown.classList.contains('hidden');

                if (!isVisible) {
                    // Dropdown gagal tampil → restart ke step awal
                    intro.goToStep(1).start();
                }
            }, 350); // waktu tunggu setelah klik
        }
        // =============================================

        // Kunci interaksi kecuali elemen step aktif
        intro.onbeforechange(function (targetElement) {
            document.body.style.pointerEvents = "none";
            targetElement.style.pointerEvents = "auto";
        });

        intro.onexit(() => {
            document.body.style.pointerEvents = "auto";
        });

        // Ketika klik menu
        btnMenu.addEventListener('click', () => {
            dropdown.classList.remove('hidden');

            intro.nextStep();

            // Pastikan dropdown muncul, kalau tidak ulangi step
            checkDropdownOrRestart();
        });

        linkProfil.addEventListener('click', () => intro.exit());

        intro.start();

    }, 300);
});




// PERUSAHAAN
document.addEventListener("DOMContentLoaded", function () {

    const disabledRoutes = [
        '/perusahaan/profile',
        '/perusahaan/edit/profile',
        '/perusahaan/form/alamat',
        '/perusahaan/alamat',
        '/perusahaan/edit/alamat'
    ];

    const currentPath = window.location.pathname;
    const isDisabled = disabledRoutes.some(route => currentPath.startsWith(route));
    if (isDisabled) return;

    const shouldShowIntro = document.querySelector('meta[name="show-intro"]');
    if (!shouldShowIntro) return;

    const btnMenu = document.querySelector('#ntap');
    const linkProfil = document.querySelector('#profile-lank');
    const dropdown = document.getElementById('user-dropdown');

    if (!btnMenu || !linkProfil || !dropdown) return;

    dropdown.classList.add('hidden');

    setTimeout(() => {

        let intro = introJs();
        intro.setOptions({
            steps: [
                {
                    element: '#ntap',
                    intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="/images/Lengkapi Profile.jpg" style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                    position: 'left',
                    tooltipClass: 'notif-profil',
                    disableInteraction: true
                },
                {
                    element: '#profile-lank',
                    intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="/images/klik3.png" style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                    position: 'right',
                    tooltipClass: 'notif-profil',
                    disableInteraction: true
                }
            ],
            showButtons: false,
            showBullets: false,
            showProgress: false,
            exitOnOverlayClick: false,
            showStepNumbers: false
        });

        // =============== FIX UTAMA ==================
        // Cek apakah dropdown berhasil tampil
        function checkDropdownOrRestart() {
            setTimeout(() => {
                const isVisible = !dropdown.classList.contains('hidden');

                if (!isVisible) {
                    // Dropdown gagal tampil → restart ke step awal
                    intro.goToStep(1).start();
                }
            }, 350); // waktu tunggu setelah klik
        }
        // =============================================

        // Kunci interaksi kecuali elemen step aktif
        intro.onbeforechange(function (targetElement) {
            document.body.style.pointerEvents = "none";
            targetElement.style.pointerEvents = "auto";
        });

        intro.onexit(() => {
            document.body.style.pointerEvents = "auto";
        });

        // Ketika klik menu
        btnMenu.addEventListener('click', () => {
            dropdown.classList.remove('hidden');

            intro.nextStep();

            // Pastikan dropdown muncul, kalau tidak ulangi step
            checkDropdownOrRestart();
        });

        linkProfil.addEventListener('click', () => intro.exit());

        intro.start();

    }, 300);
});


