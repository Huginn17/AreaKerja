@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Perusahaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white font-sans">

  <!-- Container utama, default block, jadi header & form bertumpuk vertikal -->
  <div class="w-full max-w-4xl mx-auto mt-10 px-6 overflow-y-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center pb-4 mb-8">
      <h1 class="text-xl font-bold text-gray-800">Data Talent Hunter</h1>

      <div class="flex items-center space-x-1">
        <!-- Notifikasi -->
        <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_738_12254)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3472" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_738_12254">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27539)"/>
</clipPath>
</defs>
</svg>


        <!-- Profil -->
        <div class="flex items-center bg-white shadow-md rounded-lg px-3 py-1 space-x-3">
          <img src="https://avatar.iran.liara.run/public/boy" alt="Avatar" class="w-8 h-8 rounded-full object-cover" />
          <div class="text-left leading-tight">
            <p class="text-sm font-semibold text-gray-800">Steve Jobs</p>
            <p class="text-xs text-gray-500">stevejobs@gmail.com</p>
          </div>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
    </div>
    
<div class="max-w-4xl mx-auto mt-10 border border-gray-400 rounded-t-lg p-6 border-b-0 overflow-y-auto">

  <!-- Header -->
  <div class="flex items-center p-6 border-b border-gray-600 rounded-t-lg">
    <img src="{{asset('images/seven.png')}}" alt="Logo" class="h-25 w-30 object-contain" />
    <h1 class="flex-1 text-center font-bold text-lg md:text-xl">SEVEN INC</h1>
  </div>

  <!-- Konten -->
  <div class="p-6 space-y-6 text-gray-800 text-sm">

    <section>
      <h2 class="font-bold text-lg mb-2">Deskripsi</h2>
      <p class="font-semibold">SEVEN INC adalah perusahaan yang bergerak di bidang teknologi dan inovasi digital. Fokus utama peru...</p>
    </section>

    <section>
      <h2 class="font-bold text-lg mb-2">Culture Perusahaan</h2>
      <p class="font-bold">-</p>
    </section>

    <section>
      <h2 class="font-bold text-lg mb-2">Alamat Perusahaan</h2>
      <p class="font-semibold">Ngasinan, Kraguman, Jogonalan, Klaten, Jawa Tengah 57452</p>
    </section>

    <section>
      <h2 class="font-bold text-lg mb-3">Kriteria Kandidat</h2>
      <div class="grid grid-cols-[12rem_1rem_auto] gap-y-2 text-sm">
        <div class="font-semibold">Posisi yang dibutuhkan</div>
        <div>:</div>
        <div class="font-semibold">Front-End Developer</div>

        <div class="font-semibold">Jenis Kelamin</div>
        <div>:</div>
        <div class="font-semibold">Laki-Laki</div>

        <div class="font-semibold">Kisaran Gaji</div>
        <div>:</div>
        <div class="font-semibold">Rp 4.500.000 sampai Rp 6.500.000</div>

        <div class="font-semibold">Detail Tambahan</div>
        <div>:</div>
        <div class="font-semibold">Memiliki pengalaman lebih dari 1 tahun</div>
      </div>
    </section>

  </div>
<div class="flex space-x-4 justify-center mt-4">
  <button class="bg-green-600 text-white font-semibold px-8 py-2 rounded-md shadow-md hover:bg-green-700 transition-duration-300">
    Simpan
  </button>
  <button class="bg-red-600 text-white font-semibold px-9 py-2 rounded-md shadow-md hover:bg-red-700 transition-duration-300">
    Batal
  </button>
</div>
</body>
</html>

@endsection
