import './bootstrap';
import '../css/app.css'; 
import introJs from 'intro.js';
import 'intro.js/introjs.css';

document.addEventListener("DOMContentLoaded", function() {

    // Tambahkan route dinamis: /pelamar/edit/alamat/{id}
    const disabledRoutes = [
        '/pelamar/profile',
        '/pelamar/form/alamat',
        '/pelamar/edit/alamat' // <-- untuk route /edit/alamat/{id}
    ];

    const currentPath = window.location.pathname;

    // Cek apakah path sekarang diawali salah satu disabled route
    const isDisabled = disabledRoutes.some(route =>
        currentPath.startsWith(route)
    );

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

        intro.onbeforechange(function(targetElement) {
            document.body.style.pointerEvents = "none";
            targetElement.style.pointerEvents = "auto";
        });

        intro.onexit(() => {
            document.body.style.pointerEvents = "auto";
        });

        btnMenu.addEventListener('click', () => {
            dropdown.classList.remove('hidden');
            intro.nextStep();
        });

        linkProfil.addEventListener('click', () => intro.exit());

        intro.start();

    }, 300);
});



//PERUSAHAAN
document.addEventListener("DOMContentLoaded", function () {

    // Tambahkan route dinamis di sini (pakai prefix saja)
    const disabledRoutes = [
        '/perusahaan/profile',
        '/perusahaan/edit/profile',
        '/perusahaan/form/alamat',
        '/perusahaan/alamat',
        '/perusahaan/edit/alamat' // untuk /edit/alamat/{id}
    ];

    const currentPath = window.location.pathname;

    // Cek apakah route sekarang diawali salah satu prefix yang dilarang
    const isDisabled = disabledRoutes.some(route =>
        currentPath.startsWith(route)
    );

    if (isDisabled) return;

    // Mengecek apakah intro boleh tampil
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

        // Kunci interaksi kecuali elemen step aktif
        intro.onbeforechange(function (targetElement) {
            document.body.style.pointerEvents = "none";
            targetElement.style.pointerEvents = "auto";
        });

        // Kembalikan ketika selesai
        intro.onexit(() => {
            document.body.style.pointerEvents = "auto";
        });

        // Step klik menu
        btnMenu.addEventListener('click', () => {
            dropdown.classList.remove('hidden');
            intro.nextStep();
        });

        // Step klik profil
        linkProfil.addEventListener('click', () => intro.exit());

        intro.start();

    }, 300);

});

