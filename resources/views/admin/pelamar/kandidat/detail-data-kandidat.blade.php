@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <div class="overflow-y-auto">
            <div class="max-w-6xl mx-auto bg-white p-10 text-gray-800">
                <main class="flex-1 p-6 bg-white overflow-y-auto">
                    {{-- <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-medium"></h1>
                <div class="flex items-center gap-3">
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_722_7956)">
                            <path
                                d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                fill="black" />
                            <path
                                d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                                fill="black" />
                            <ellipse cx="21.3472" cy="5.13034" rx="6.35506" ry="6.15646" fill="#E46054" />
                        </g>
                        <path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z"
                            fill="white" />
                        <defs>
                            <clipPath id="clip0_722_7956">
                                <rect width="25.3967" height="27.7315" fill="white"
                                    transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27612)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div
                        class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                        <a href="#">
                            <img src="{{ asset('images/logoarea.png') }}" class="w-8 h-8 rounded-full" alt="User">
                        </a>
                        <div class="text-sm">
                            <div class="font-semibold">Steven Jobs</div>
                            <div class="text-gray-500">StevenJobs123@gmail.com</div>
                        </div>

                        <select
                            class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                            <option>Text 1</option>
                            <option>Text 2</option>
                            <option>Text 3</option>
                        </select>
                    </div>
                </div>
            </div><br>
            <br> --}}
                    <!-- Header -->
                    <div class="flex items-center justify-between pb-6">

                        <!-- Foto & Nama -->
                        <div class="flex items-center gap-4 overflow-y-auto">
                            @if (!empty($pdf))
                                <img src="{{ public_path('storage/' . $pelamar->img_profile) }}" alt="Profile"
                                    class="w-32 h-32 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">
                            @else
                                <img src="{{ asset('storage/' . $pelamar->img_profile) }}" alt="Profile"
                                    class="w-32 h-32 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">
                            @endif
                            <img hidden src="{{ public_path('storage/' . $pelamar->img_profile) }}" alt="Profile"
                                class="w-32 h-32 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">
                            <div>
                                <h1 class="text-2xl font-bold text-orange-600 mb-1">{{ $pelamar->nama_pelamar ?? $pelamar->user->username }} </h1>
                                <p class="text-sm font-semibold">
                                    {{ optional($pelamar->alamat_pelamar->first())->label ?? '-' }},
                                    {{ optional($pelamar->alamat_pelamar->first())->desa ?? '-' }} <br>
                                    {{ optional($pelamar->alamat_pelamar->first())->kecamatan ?? '-' }},
                                    {{ optional($pelamar->alamat_pelamar->first())->kota ?? '-' }}
                                    ,<br>
                                    {{ optional($pelamar->alamat_pelamar->first())->provinsi ?? '-' }},
                                    {{ optional($pelamar->alamat_pelamar->first())->kode_pos ?? '-' }}</p>
                            </div>
                        </div>
                        <!-- Kontak -->
                        <div class="text-sm space-y-2 text-right font-semibold">
                            <p class="flex items-center gap-2">
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.6779 3.9625C16.8074 3.86563 17 3.95625 17 4.10938V10.5C17 11.3281 16.2861 12 15.4062 12H1.59375C0.713867 12 0 11.3281 0 10.5V4.1125C0 3.95625 0.189258 3.86875 0.32207 3.96562C1.06582 4.50937 2.05195 5.2 5.43867 7.51562C6.13926 7.99687 7.32129 9.00938 8.5 9.00313C9.68535 9.0125 10.8906 7.97813 11.5646 7.51562C14.9514 5.2 15.9342 4.50625 16.6779 3.9625ZM8.5 8C9.27031 8.0125 10.3793 7.0875 10.9371 6.70625C15.3432 3.69688 15.6785 3.43437 16.6945 2.68437C16.8871 2.54375 17 2.325 17 2.09375V1.5C17 0.671875 16.2861 0 15.4062 0H1.59375C0.713867 0 0 0.671875 0 1.5V2.09375C0 2.325 0.112891 2.54062 0.305469 2.68437C1.32148 3.43125 1.65684 3.69688 6.06289 6.70625C6.6207 7.0875 7.72969 8.0125 8.5 8Z"
                                        fill="#FA6601" />
                                </svg>

                                {{ $pelamar->user->email }}
                            </p>
                            <p class="flex items-center gap-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5152 12.0128L12.7964 10.419C12.6375 10.3513 12.461 10.3371 12.2933 10.3784C12.1256 10.4197 11.9759 10.5144 11.8667 10.6481L10.2198 12.6603C7.63511 11.4416 5.55505 9.36157 4.3364 6.77691L6.34855 5.13C6.48258 5.02099 6.57745 4.87127 6.61879 4.70352C6.66013 4.53577 6.64569 4.35911 6.57765 4.2003L4.98388 0.481485C4.90921 0.310289 4.77714 0.170514 4.61045 0.0862606C4.44376 0.00200721 4.2529 -0.0214431 4.07077 0.0199532L0.617589 0.816842C0.441997 0.85739 0.285334 0.956258 0.173169 1.09731C0.0610036 1.23836 -4.04491e-05 1.41326 2.01088e-08 1.59348C2.01088e-08 10.1102 6.90305 17 15.4065 17C15.5868 17.0001 15.7618 16.9391 15.9029 16.8269C16.044 16.7148 16.1429 16.5581 16.1835 16.3824L16.9804 12.9292C17.0215 12.7462 16.9976 12.5546 16.9127 12.3873C16.8277 12.2201 16.6872 12.0876 16.5152 12.0128Z"
                                        fill="#FA6601" />
                                </svg>
                                {{ $pelamar->telepon_pelamar }}
                            </p>
                            <p class="flex items-center gap-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.5019 4.14141C6.08985 4.14141 4.14428 6.08742 4.14428 8.5C4.14428 10.9126 6.08985 12.8586 8.5019 12.8586C10.9139 12.8586 12.8595 10.9126 12.8595 8.5C12.8595 6.08742 10.9139 4.14141 8.5019 4.14141ZM8.5019 11.3336C6.94317 11.3336 5.66888 10.0629 5.66888 8.5C5.66888 6.93713 6.93938 5.66635 8.5019 5.66635C10.0644 5.66635 11.3349 6.93713 11.3349 8.5C11.3349 10.0629 10.0606 11.3336 8.5019 11.3336ZM14.0542 3.96313C14.0542 4.52834 13.5991 4.97975 13.0378 4.97975C12.4727 4.97975 12.0214 4.52455 12.0214 3.96313C12.0214 3.40171 12.4765 2.9465 13.0378 2.9465C13.5991 2.9465 14.0542 3.40171 14.0542 3.96313ZM16.9403 4.99492C16.8758 3.6331 16.5648 2.42681 15.5674 1.43295C14.5737 0.439083 13.3677 0.128026 12.0062 0.0597456C10.603 -0.0199152 6.39704 -0.0199152 4.99381 0.0597456C3.63609 0.124233 2.43006 0.43529 1.43263 1.42915C0.435193 2.42302 0.127998 3.62931 0.0597323 4.99113C-0.0199108 6.39468 -0.0199108 10.6015 0.0597323 12.0051C0.124205 13.3669 0.435193 14.5732 1.43263 15.5671C2.43006 16.5609 3.63229 16.872 4.99381 16.9403C6.39704 17.0199 10.603 17.0199 12.0062 16.9403C13.3677 16.8758 14.5737 16.5647 15.5674 15.5671C16.561 14.5732 16.872 13.3669 16.9403 12.0051C17.0199 10.6015 17.0199 6.39847 16.9403 4.99492ZM15.1274 13.511C14.8316 14.2545 14.259 14.8273 13.5118 15.127C12.393 15.5708 9.73826 15.4684 8.5019 15.4684C7.26553 15.4684 4.60697 15.5671 3.49197 15.127C2.74863 14.8311 2.17596 14.2583 1.87635 13.511C1.43263 12.392 1.53503 9.73664 1.53503 8.5C1.53503 7.26336 1.43642 4.60421 1.87635 3.48895C2.17217 2.74545 2.74484 2.17265 3.49197 1.87298C4.61076 1.42915 7.26553 1.53157 8.5019 1.53157C9.73826 1.53157 12.3968 1.43295 13.5118 1.87298C14.2552 2.16886 14.8278 2.74166 15.1274 3.48895C15.5712 4.608 15.4688 7.26336 15.4688 8.5C15.4688 9.73664 15.5712 12.3958 15.1274 13.511Z"
                                        fill="#FA6601" />
                                </svg>
                                {{ $sosmed && !empty($sosmed->instagram) ? $sosmed->instagram : 'tidak ada data' }}
                            </p>
                            <p class="flex items-center gap-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.7857 0H1.21049C0.542634 0 0 0.550223 0 1.22567V15.7743C0 16.4498 0.542634 17 1.21049 17H15.7857C16.4536 17 17 16.4498 17 15.7743V1.22567C17 0.550223 16.4536 0 15.7857 0ZM5.13795 14.5714H2.6183V6.45848H5.14174V14.5714H5.13795ZM3.87812 5.35045C3.06987 5.35045 2.41719 4.69397 2.41719 3.88951C2.41719 3.08504 3.06987 2.42857 3.87812 2.42857C4.68259 2.42857 5.33906 3.08504 5.33906 3.88951C5.33906 4.69777 4.68638 5.35045 3.87812 5.35045ZM14.5828 14.5714H12.0632V10.625C12.0632 9.68393 12.0442 8.47344 10.754 8.47344C9.44107 8.47344 9.23996 9.49799 9.23996 10.5567V14.5714H6.72031V6.45848H9.1375V7.56652H9.17165C9.50937 6.92902 10.3328 6.25737 11.5585 6.25737C14.1085 6.25737 14.5828 7.93839 14.5828 10.1241V14.5714Z"
                                        fill="#FA6601" />
                                </svg>

                                {{ $sosmed && !empty($sosmed->linkedin) ? $sosmed->linkedin : 'tidak ada data' }}
                            </p>
                        </div>
                    </div>

                    <!-- Body CV: 2 Kolom -->
                    <div class="grid md:grid-cols-2 gap-8 mt-8">
                        <!-- Kolom Kiri -->
                        <div class="space-y-8">

                            <!-- Tentang Saya -->
                            <section>
                                <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">TENTANG
                                    SAYA
                                </div>
                                <div style="width: 40px; height: 5px; background-color: #f97316; margin-bottom: 16px;"><svg
                                        width="335" height="1" viewBox="0 0 335 1" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="335" height="1" fill="#FA6601" />
                                    </svg>
                                </div>
                                <p style="margin-top: 0; margin-bottom: 24px;" class="text-sm">
                                    {{ optional($pelamar)->deskripsi_diri ?? '-' }}</p>
                            </section>

                            <!-- KEAHLIAN & KOMPETENSI -->
                            <section>
                                <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">KEAHLIAN
                                    &amp; KOMPETENSI</div>
                                <div style="width: 40px; height: 5px; background-color: #f97316; margin-bottom: 16px;"><svg
                                        width="335" height="1" viewBox="0 0 335 1" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="335" height="1" fill="#FA6601" />
                                    </svg>
                                </div>
                                <table style="width: auto;  font-size: 12px; margin-bottom: 24px;">
                                    @forelse ($pelamar->skill as $skill)
                                        <tr class="flex justify-between">
                                            <td style="padding: 2px 0;" class="font-bold">
                                                ﹒{{ $skill->skill }} - {{ $skill->experience_level }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2"
                                                style="padding: 4px 0; text-align:center; font-style: italic;">
                                                Tidak ada data keahlian.
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </section>


                            <!-- Organisasi -->
                            <section>
                                <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">
                                    ORGANISASI</div>
                                <div style="width: 40px; height: 5px; background-color: #f97316; margin-bottom: 16px;">
                                    <svg width="335" height="1" viewBox="0 0 335 1" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="335" height="1" fill="#FA6601" />
                                    </svg>
                                </div>
                                @forelse ($pelamar->pengalaman_organisasi as $org)
                                    <p style="margin: 0 0 14px 0;">
                                        <b class="text-sm">
                                            Jabatan – {{ $org->jabatan }}
                                        </b>

                                        <span style="float: right;">
                                            <b>({{ $org->tahun_awal }}–{{ $org->tahun_akhir }})</b>
                                        </span>
                                        <br>

                                        <b class="text-sm">{{ $org->nama_organisasi }}</b>

                                    <h4 class="text-sm" style="margin-top: 4px;">
                                        {{ $org->deskripsi }}
                                    </h4>
                                    <br>
                                @empty
                                    <p class="text-sm text-gray-600">Tidak ada pengalaman organisasi.</p>
                                @endforelse
                            </section>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-8">
                            <!-- Pengalaman Kerja -->
                            <section>
                                <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">
                                    PENGALAMAN
                                    KERJA</div>
                                <div style="width: 40px; height: 5px; background-color: #f97316; margin-bottom: 16px;"><svg
                                        width="335" height="1" viewBox="0 0 335 1" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="335" height="1" fill="#FA6601" />
                                    </svg>
                                </div>
                                <div class="mt-3 space-y-4 text-sm">
                                    <div>
                                        @forelse ($pelamar->pengalaman_kerja as $p)
                                            <p style="margin: 0 0 14px 0;">
                                                <b class="text-sm">Jabatan –
                                                    {{ optional($p)->jabatan_pekerjaan ?? '-' }}</b> <span
                                                    style="float: right;"><b
                                                        class="text-sm">({{ $p->tahun_awal }}–{{ $p->tahun_akhir }})</b></span><br>
                                                <b class="text-sm">{{ optional($p)->nama_perusahaan ?? '-' }}</b>
                                                <br> {{ optional($p)->deskripsi ?? '-' }}
                                            </p>
                                        @empty
                                            <p class="text-sm text-gray-600">Tidak ada pengalaman kerja.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </section>

                            <!-- Pendidikan -->
                            <section>
                                <div style="font-weight: 700; font-size: 18px; color: #f97316; margin-bottom: 8px;">LATAR
                                    BELAKANG PENDIDIKAN</div>
                                <div style="width: 40px; height: 5px; background-color: #f97316; margin-bottom: 16px;"><svg
                                        width="335" height="1" viewBox="0 0 335 1" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="335" height="1" fill="#FA6601" />
                                    </svg>
                                </div>
                                <div class="mt-3 space-y-2 text-sm">
                                    <div>
                                        @forelse ($pelamar->riwayat_pendidikan as $r )
                                        <p style="margin: 0 0 14px 0;">
                                            <b class="text-sm">{{ optional($r)->pendidikan ?? '-' }}</b> <span
                                                style="float: right;"><b>({{ optional($r)->tahun_awal }}–{{ optional($r)->tahun_akhir }})</b></span><br>
                                            <b class="text-sm">{{ optional($r)->jurusan ?? '-' }}</b>
                                        </p>
                                        @empty
                                            <p class="text-sm text-gray-600">Tidak ada riwayat pendidikan.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex flex-col items-center justify-center mt-10 text-sm font-semibold text-gray-800">
                        <img src="{{ $logoBase64 }}" alt="Logo Areakerja" class="w-20 h-auto mb-1">
                        Copyright &copy; AREAKERJA.com
                    </div>

            </div>

        </div>
    </div>
@endsection
