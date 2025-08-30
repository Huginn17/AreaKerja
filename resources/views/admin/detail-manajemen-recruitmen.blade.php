@extends('admin.sidebar.index')
@section('sidebaradmin')
    <!-- Profile & Notifikasi - Pojok Kanan Atas -->
    <div class="absolute top-4 right-4 flex items-center gap-3 z-50 ">
        <!-- Notifikasi SVG -->
        <div class="relative inline-block ">
            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_690_13163)">
                    <path
                        d="M23.076 14.9436L22.6747 12.7388L21.1101 13.006L21.5756 15.5638C21.6168 15.7899 21.7387 15.9927 21.9146 16.1275L24.4524 18.0737L24.6985 19.4259L7.4876 22.3659L7.24147 21.0136L8.93911 18.3439C9.05673 18.159 9.09972 17.9281 9.05861 17.702L8.43786 14.2916C8.21777 13.0939 8.29153 11.8673 8.65169 10.7357C9.01186 9.60402 9.64569 8.6074 10.4892 7.84644C11.3326 7.08548 12.3559 6.58714 13.4555 6.40174C14.5552 6.21635 15.6924 6.35046 16.7522 6.79053L16.4051 4.88327C15.595 4.65112 14.7612 4.55737 13.9346 4.60549L13.6165 2.85766L12.0518 3.12493L12.37 4.87276C10.4802 5.41616 8.87215 6.70725 7.85685 8.49636C6.84155 10.2855 6.49109 12.4455 6.87324 14.5588L7.42973 17.6162L5.7321 20.286C5.61447 20.4709 5.57149 20.7018 5.6126 20.9279L6.07815 23.4857C6.11931 23.7118 6.24121 23.9146 6.41702 24.0495C6.59284 24.1843 6.80817 24.2401 7.01565 24.2047L12.4919 23.2693L12.647 24.1219C12.8528 25.2525 13.4623 26.2664 14.3414 26.9406C15.2205 27.6147 16.2971 27.8939 17.3345 27.7167C18.3719 27.5395 19.2851 26.9204 19.8732 25.9956C20.4612 25.0709 20.676 23.9162 20.4702 22.7855L20.315 21.9329L25.7912 20.9975C25.9987 20.9621 26.1813 20.8382 26.2989 20.6533C26.4165 20.4683 26.4595 20.2374 26.4183 20.0113L25.9528 17.4535C25.9116 17.2274 25.7896 17.0246 25.6138 16.8898L23.076 14.9436ZM18.9055 23.0528C19.029 23.7312 18.9002 24.424 18.5473 24.9789C18.1945 25.5337 17.6466 25.9052 17.0242 26.0115C16.4017 26.1178 15.7557 25.9503 15.2283 25.5458C14.7008 25.1413 14.3351 24.533 14.2117 23.8546L14.0565 23.002L18.7504 22.2002L18.9055 23.0528Z"
                        fill="black" />
                    <path
                        d="M22.3629 11.0333C24.0912 10.7381 25.2143 8.97192 24.8714 7.08841C24.5286 5.2049 22.8497 3.91733 21.1214 4.21254C19.3932 4.50775 18.2701 6.27396 18.6129 8.15747C18.9558 10.041 20.6347 11.3286 22.3629 11.0333Z"
                        fill="black" />
                    <ellipse cx="21.3453" cy="5.1301" rx="6.35506" ry="6.15646" fill="#E46054" />
                </g>
                <defs>
                    <clipPath id="clip0_690_13163 ">
                        <rect width="25.3967" height="27.7315" fill="white"
                            transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.162109 4.27637)" />
                    </clipPath>
                </defs>
                <!-- Lingkaran merah notifikasi -->
                <circle cx="25" cy="7" r="7" fill="#E46054" />
                <text x="25" y="11" text-anchor="middle" fill="white" font-size="10" font-weight="bold"
                    font-family="Arial, sans-serif" style="user-select:none;">7</text>
            </svg>
            </svg>

        </div>

        <!-- Profil -->
        <div class="flex items-center gap-2 border border-gray-500 px-4 py-1 rounded-lg shadow-sm bg-white ">
            <img src="https://i.pravatar.cc/40" alt="Profile" class="w-8 h-8 rounded-full">
            <div>
                <p class="text-sm font-medium">Ronaldo</p>
                <p class="text-xs text-gray-500">ronaldo@gmail.com</p>

            </div>

        </div>
    </div><br>
    <br>
    <br>
    <div
        style="max-width: 820px; margin: 60px auto 80px 380px; font-family: Arial, sans-serif; color: #222; position: relative;">

        <!-- Tombol Close -->
        <div
            style="position: absolute; top: 15px; right: 10px; cursor: pointer; font-weight: medium; font-size: 40px; color: #555;">
            ×</div>

        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">

            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td valign="top" style="padding-right: 40px; text-align: center;">
                        <img src="https://i.pravatar.cc/110" width="110" height="110"
                            style="border-radius: 50%; object-fit: cover;" alt="Foto Profil" />
                    </td>
                    <td valign="top" style="padding-right: 40px;">
                        <div style="font-weight: bold; font-size: 30px; color: #f97316;">Bambang Kurnia</div>
                        <div style="font-size: 12px; m-1">
                            <br>
                            <div class="text-sm">Prapatan Dalam No. 04 RT. 47
                                <br>BALIKPAPAN KOTA, KOTA BALIKPAPAN,
                                <br>KALIMANTAN TIMUR, ID, 76111
                            </div>
                    </td>
                    <td valign="top" style="font-size: 12px; color: #222; padding-left: 30px;">
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td style="color: #f97316;"><svg width="17" height="12" viewBox="0 0 17 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.6779 3.9625C16.8074 3.86563 17 3.95625 17 4.10938V10.5C17 11.3281 16.2861 12 15.4062 12H1.59375C0.713867 12 0 11.3281 0 10.5V4.1125C0 3.95625 0.189258 3.86875 0.32207 3.96562C1.06582 4.50937 2.05195 5.2 5.43867 7.51562C6.13926 7.99687 7.32129 9.00938 8.5 9.00313C9.68535 9.0125 10.8906 7.97813 11.5646 7.51562C14.9514 5.2 15.9342 4.50625 16.6779 3.9625ZM8.5 8C9.27031 8.0125 10.3793 7.0875 10.9371 6.70625C15.3432 3.69688 15.6785 3.43437 16.6945 2.68437C16.8871 2.54375 17 2.325 17 2.09375V1.5C17 0.671875 16.2861 0 15.4062 0H1.59375C0.713867 0 0 0.671875 0 1.5V2.09375C0 2.325 0.112891 2.54062 0.305469 2.68437C1.32148 3.43125 1.65684 3.69688 6.06289 6.70625C6.6207 7.0875 7.72969 8.0125 8.5 8Z"
                                            fill="#FA6601" />
                                    </svg>
                                </td>
                                <td style="padding-left: 8px;">bambangkurnia@gmail.com</td>
                            <tr>
                                <td colspan="2" height="5`"></td>
                            </tr>
                            <tr>
                                <td style="color: #f97316;"><svg width="17" height="17" viewBox="0 0 17 17"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.5152 12.0128L12.7964 10.419C12.6375 10.3513 12.461 10.3371 12.2933 10.3784C12.1256 10.4197 11.9759 10.5144 11.8667 10.6481L10.2198 12.6603C7.63511 11.4416 5.55505 9.36157 4.3364 6.77691L6.34855 5.13C6.48258 5.02099 6.57745 4.87127 6.61879 4.70352C6.66013 4.53577 6.64569 4.35911 6.57765 4.2003L4.98388 0.481485C4.90921 0.310289 4.77714 0.170514 4.61045 0.0862606C4.44376 0.00200721 4.2529 -0.0214431 4.07077 0.0199532L0.617589 0.816842C0.441997 0.85739 0.285334 0.956258 0.173169 1.09731C0.0610036 1.23836 -4.04491e-05 1.41326 2.01088e-08 1.59348C2.01088e-08 10.1102 6.90305 17 15.4065 17C15.5868 17.0001 15.7618 16.9391 15.9029 16.8269C16.044 16.7148 16.1429 16.5581 16.1835 16.3824L16.9804 12.9292C17.0215 12.7462 16.9976 12.5546 16.9127 12.3873C16.8277 12.2201 16.6872 12.0876 16.5152 12.0128Z"
                                            fill="#FA6601" />
                                    </svg>
                                </td>
                                <td style="padding-left: 8px;">08123456789</td>
                            <tr>
                                <td colspan="2" height="5"></td>
                            </tr>
                            <tr>
                                <td style="color: #f97316;"><svg width="17" height="17" viewBox="0 0 17 17"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.5019 4.14141C6.08985 4.14141 4.14428 6.08742 4.14428 8.5C4.14428 10.9126 6.08985 12.8586 8.5019 12.8586C10.9139 12.8586 12.8595 10.9126 12.8595 8.5C12.8595 6.08742 10.9139 4.14141 8.5019 4.14141ZM8.5019 11.3336C6.94317 11.3336 5.66888 10.0629 5.66888 8.5C5.66888 6.93713 6.93938 5.66635 8.5019 5.66635C10.0644 5.66635 11.3349 6.93713 11.3349 8.5C11.3349 10.0629 10.0606 11.3336 8.5019 11.3336ZM14.0542 3.96313C14.0542 4.52834 13.5991 4.97975 13.0378 4.97975C12.4727 4.97975 12.0214 4.52455 12.0214 3.96313C12.0214 3.40171 12.4765 2.9465 13.0378 2.9465C13.5991 2.9465 14.0542 3.40171 14.0542 3.96313ZM16.9403 4.99492C16.8758 3.6331 16.5648 2.42681 15.5674 1.43295C14.5737 0.439083 13.3677 0.128026 12.0062 0.0597456C10.603 -0.0199152 6.39704 -0.0199152 4.99381 0.0597456C3.63609 0.124233 2.43006 0.43529 1.43263 1.42915C0.435193 2.42302 0.127998 3.62931 0.0597323 4.99113C-0.0199108 6.39468 -0.0199108 10.6015 0.0597323 12.0051C0.124205 13.3669 0.435193 14.5732 1.43263 15.5671C2.43006 16.5609 3.63229 16.872 4.99381 16.9403C6.39704 17.0199 10.603 17.0199 12.0062 16.9403C13.3677 16.8758 14.5737 16.5647 15.5674 15.5671C16.561 14.5732 16.872 13.3669 16.9403 12.0051C17.0199 10.6015 17.0199 6.39847 16.9403 4.99492ZM15.1274 13.511C14.8316 14.2545 14.259 14.8273 13.5118 15.127C12.393 15.5708 9.73826 15.4684 8.5019 15.4684C7.26553 15.4684 4.60697 15.5671 3.49197 15.127C2.74863 14.8311 2.17596 14.2583 1.87635 13.511C1.43263 12.392 1.53503 9.73664 1.53503 8.5C1.53503 7.26336 1.43642 4.60421 1.87635 3.48895C2.17217 2.74545 2.74484 2.17265 3.49197 1.87298C4.61076 1.42915 7.26553 1.53157 8.5019 1.53157C9.73826 1.53157 12.3968 1.43295 13.5118 1.87298C14.2552 2.16886 14.8278 2.74166 15.1274 3.48895C15.5712 4.608 15.4688 7.26336 15.4688 8.5C15.4688 9.73664 15.5712 12.3958 15.1274 13.511Z"
                                            fill="#FA6601" />
                                    </svg>
                                </td>
                                <td style="padding-left: 8px;">bambang_kurnia</td>
                            <tr>
                                <td colspan="2" height="5"></td>
                            </tr>
                            <tr>
                                <td style="color: #f97316;">
                                    <!-- SVG LinkedIn Icon -->
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.7857 0H1.21049C0.542634 0 0 0.550223 0 1.22567V15.7743C0 16.4498 0.542634 17 1.21049 17H15.7857C16.4536 17 17 16.4498 17 15.7743V1.22567C17 0.550223 16.4536 0 15.7857 0ZM5.13795 14.5714H2.6183V6.45848H5.14174V14.5714H5.13795ZM3.87812 5.35045C3.06987 5.35045 2.41719 4.69397 2.41719 3.88951C2.41719 3.08504 3.06987 2.42857 3.87812 2.42857C4.68259 2.42857 5.33906 3.08504 5.33906 3.88951C5.33906 4.69777 4.68638 5.35045 3.87812 5.35045ZM14.5828 14.5714H12.0632V10.625C12.0632 9.68393 12.0442 8.47344 10.754 8.47344C9.44107 8.47344 9.23996 9.49799 9.23996 10.5567V14.5714H6.72031V6.45848H9.1375V7.56652H9.17165C9.50937 6.92902 10.3328 6.25737 11.5585 6.25737C14.1085 6.25737 14.5828 7.93839 14.5828 10.1241V14.5714Z"
                                            fill="#FA6601" />
                                    </svg>
                                </td>
                                <td style="padding-left: 8px;">Bambang Kurnia</td>
                            </tr>

                        </table>
                    </td>


                </tr>
            </table>


            <div
                style="max-width: 900px; margin: 40px auto; font-family: Arial, sans-serif; color: #222; line-height: 1.5; font-size: 12px;">

                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                    style="border-collapse: collapse;">
                    <tr valign="top">
                        <!-- Kolom kiri -->
                        <td width="50%">

                            <!-- TENTANG SAYA -->
                            <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">TENTANG
                                SAYA</div>
                            <div style="width: 40px; height: 3px; background-color: #f97316; margin-bottom: 16px;"><svg
                                    width="335" height="1" viewBox="0 0 335 1" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="335" height="1" fill="#FA6601" />
                                </svg>
                            </div>
                            <p style="margin-top: 0; margin-bottom: 24px;">
                                Saya adalah lulusan Teknik Informatika di Universitas Gadjah Mada yang memiliki minat besar
                                dalam pengembangan web dan aplikasi. Dengan keahlian dalam Flutter untuk pengembangan
                                aplikasi berbasis Android serta PHP untuk pemrograman web, saya terus mengasah kemampuan
                                saya di bidang teknologi. Saya bercita-cita menjadi seorang programmer full-stack yang mampu
                                mengembangkan aplikasi atau website sendiri, dengan harapan dapat memberikan kontribusi
                                positif bagi masyarakat dalam menghadapi perkembangan dunia digital yang semakin pesat.
                            </p>

                            <!-- KEAHLIAN & KOMPETENSI -->
                            <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">KEAHLIAN
                                &amp; KOMPETENSI</div>
                            <div style="width: 40px; height: 3px; background-color: #f97316; margin-bottom: 16px;"><svg
                                    width="335" height="1" viewBox="0 0 335 1" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="335" height="1" fill="#FA6601" />
                                </svg>
                            </div>
                            <table style="width: 100%;  font-size: 12px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 2px 0;" class="font-bold">﹒Laravel</td>
                                    <td style="text-align: right; padding: 2px 0;" class="font-bold">Expert</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px 0;" class="font-bold">﹒PHP</td>
                                    <td style="text-align: right; padding: 2px 0;" class="font-bold">Intermediate</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px 0;" class="font-bold">﹒Flutter</td>
                                    <td style="text-align: right; padding: 2px 0;" class="font-bold">Expert</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px 0;" class="font-bold">﹒CSS</td>
                                    <td style="text-align: right; padding: 2px 0;" class="font-bold">Intermediate</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px 0;" class="font-bold">﹒Java Script</td>
                                    <td style="text-align: right; padding: 2px 0;" class="font-bold">Expert</td>
                                </tr>
                            </table>

                            <!-- ORGANISASI -->
                            <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">ORGANISASI
                            </div>
                            <div style="width: 40px; height: 3px; background-color: #f97316; margin-bottom: 20px;"><svg
                                    width="335" height="1" viewBox="0 0 335 1" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="335" height="1" fill="#FA6601" />
                                </svg>
                            </div>

                            <p style="margin: 0 0 14px 0;">
                                <b>Jabatan – Tim Kreatif</b> <span style="float: right;"><b>(2018–2019)</b></span><br>
                                <b>HIMA ILKOM UGM</b><br>
                                <br>Sebagai anggota Tim Kreatif, saya bertanggung jawab dalam menghasilkan konsep kreatif
                                untuk berbagai kegiatan dan acara yang diselenggarakan oleh himpunan. Saya berkolaborasi
                                dengan tim untuk merancang desain visual, materi promosi, serta konten media sosial yang
                                menarik dan efektif dalam menyampaikan pesan kepada anggota dan masyarakat.
                            </p>

                            <p style="margin: 0 0 14px 0; clear: both;">
                                <b>Jabatan – Divisi Humas</b> <span style="float: right;"><b>(2018–2019)</b></span><br>
                                <b>BEM KM UGM</b><br>
                                <br>sebagai anggota Divisi Humas BEM KM UGM, saya berperan dalam menjaga komunikasi yang
                                baik antara organisasi dengan mahasiswa, pihak universitas, serta masyarakat umum. Tugas
                                saya meliputi penyusunan strategi komunikasi, penyebaran informasi terkait kegiatan BEM
                                melalui berbagai platform, seperti media sosial, website, dan publikasi langsung.
                            </p>
                        </td>

                        <!-- Kolom kanan -->
                        <td width="50%" style="padding-left: 30px;">
                            <!-- PENGALAMAN KERJA -->
                            <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">PENGALAMAN
                                KERJA</div>
                            <div style="width: 40px; height: 3px; background-color: #f97316; margin-bottom: 16px;"><svg
                                    width="335" height="1" viewBox="0 0 335 1" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="335" height="1" fill="#FA6601" />
                                </svg>
                            </div>

                            <p style="margin: 0 0 14px 0;">
                                <b>Jabatan – UI/UX Designer</b> <span style="float: right;"><b>(2020–2022)</b></span><br>
                                <b>PT. Mega Jaya Permata</b>
                                <br> Bertanggung jawab untuk merancang antarmuka pengguna yang intuitif dan menyenangkan.
                                Saya berkolaborasi dengan tim pengembang untuk memastikan setiap elemen desain tidak hanya
                                estetis tetapi juga fungsional. Dalam pekerjaan ini, saya menggunakan tools seperti Figma
                                dan Adobe XD untuk membuat wireframing, prototype, serta user flow efektif.
                            </p>

                            <p style="margin: 0 0 14px 0; clear: both;">
                                <b>Jabatan – Front End Developer</b> <span
                                    style="float: right;"><b>(2022–2023)</b></span><br>
                                <b>PT. PERTAMINA (Persero)</b>
                                <br> Bertugas untuk mengimplementasikan desain UI/UX ke dalam kode yang berfungsi dengan
                                baik di sisi klien. Saya menggunakan teknologi seperti HTML, CSS, JavaScript, serta
                                framework seperti React dan Vue.js untuk membangun antarmuka pengguna yang responsif dan
                                interaktif.
                            </p>

                            <p style="margin: 0 0 14px 0; clear: both;">
                                <b>Jabatan – Back End Developer</b> <span
                                    style="float: right;"><b>(2023–2024)</b></span><br>
                                <b>PT. Haryanto Group</b>
                                <br> Fokus utama saya adalah pada pengembangan dan pengelolaan server, basis data, serta
                                logika aplikasi di sisi server. Saya menggunakan bahasa pemrograman seperti PHP dan Node.js
                                untuk membangun API dan sistem back-end yang handal, efisien, dan aman. Saya juga
                                bertanggung jawab untuk memastikan data yang diolah dapat diakses secara cepat dan aman oleh
                                pengguna melalui front-end, serta memastikan aplikasi dapat berkembang dengan baik seiring
                                dengan meningkatnya permintaan dan penggunaan.
                            </p>
                            <!-- LATAR BELAKANG PENDIDIKAN -->
                            <div
                                style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px; margin-top: 40px;">
                                LATAR BELAKANG PENDIDIKAN</div>
                            <div style="width: 40px; height: 3px; background-color: #f97316; margin-bottom: 16px;"><svg
                                    width="335" height="1" viewBox="0 0 335 1" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="335" height="1" fill="#FA6601" />
                                </svg>
                            </div>

                            <p style="margin: 0 0 14px 0;">
                                <b>Universitas Gadjah Mada</b> <span style="float: right;"><b>(2018–2019)</b></span><br>
                                <b>Teknik Informatika</b>
                            </p>

                            <p style="margin: 0 0 14px 0; clear: both;">
                                <b>SMK Negeri 2 Yogyakarta</b> <span style="float: right;"><b>(2018–2019)</b></span><br>
                                <b>Teknik Komputer dan Jaringan</b>
                            </p>
                        </td>
                    </tr>
                </table>

                <div
                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top: 40px; font-size: 12px; color: #222;">
                    <img src="{{ asset('images/logoarea.png') }}" alt="Logo Areakerja"
                        style="width: 80px; height: auto; margin-bottom: 4px;">
                    <b>Copyright &copy; AREAKERJA.com</b>
                </div>

            </div>
        @endsection
