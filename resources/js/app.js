import './bootstrap';
import '../css/app.css'; 
import introJs from 'intro.js';
import 'intro.js/introjs.css';

document.addEventListener("DOMContentLoaded", function() {

    const disabledRoutes = ['/pelamar/profile', '/pelamar/form/alamat'];
    if (disabledRoutes.includes(window.location.pathname)) return;

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
                            <img src="/images/Klik Profil.jpg" style="width:100%; border-radius:12px;" />
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

        // KUNCI seluruh interaksi kecuali elemen step aktif
        intro.onbeforechange(function(targetElement) {
            document.body.style.pointerEvents = "none";
            targetElement.style.pointerEvents = "auto";
        });

        intro.onexit(() => {
            document.body.style.pointerEvents = "auto"; // kembalikan setelah selesai
        });

        // Step klik menu
        btnMenu.addEventListener('click', () => {
            dropdown.classList.remove('hidden');
            intro.nextStep();
        });

        // Step klik profil (akhir tutorial)
        linkProfil.addEventListener('click', () => intro.exit());

        intro.start();

    }, 300);
});
