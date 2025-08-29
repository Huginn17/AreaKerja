@extends('admin.sidebar.index')
@section('sidebaradmin')

  <!-- 🔔 PROFIL & NOTIFIKASI DI POJOK KANAN ATAS -->
  <div class="absolute top-6 right-6 flex items-center space-x-2 z-50">
    <!-- Notifikasi Icon -->
    <button>
      <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_702_15477)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3453" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_702_15477">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.162109 4.27539)"/>
</clipPath>
</defs>
</svg>

    </button>

    <!-- Profil Box -->
    <div class="flex items-center bg-white px-5 py-2 border-gray-500 border rounded-lg shadow">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-6 h-6 rounded-full mr-2" />
      <div>
        <p class="text-sm font-medium leading-none">Ronaldo</p>
        <p class="text-xs text-gray-500 leading-none">ronaldo@gmail.com</p>
      </div>
    </div>
  </div><br>
  <br>

  <!-- 🧾 FORM UTAMA -->
  <<!-- Container utama dengan border semua sisi -->
<div class="max-w-4xl w-full mx-auto mt-10 border border-gray-700 rounded-lg shadow-lg p-10 bg-white text-sm font-sans translate-x-24">

  <!-- Bagian dalam dengan border bawah saja -->
 <div class="border-b border-gray-700 pb-6 mb-6 rounded-b-lg">
    <div class="flex items-center">
      <img src="{{ asset('images/seven.png') }}" alt="Logo" class="h-30">
      <h1 class="text-center text-2xl flex-grow font-bold">SEVEN INC</h1>
      <div class="w-16"></div> <!-- spacer -->
    </div>
  </div>


    <!-- Deskripsi -->
    <div class="mb-4">
      <h2 class="font-bold text-lg mb-2">Deskripsi</h2>
      <p class="text-justif font-medium">
        Lorem ipsum dolor sit amet consectetur. Eget potenti mauris fringilla consectetur. Vel orci ultrices nibh pharetra urna. Natoque consequat eros ornare eget arcu amet tortor. Vel in pulvinar posuere et enim vitae commodo sed.
      </p>
    </div>

    <!-- Visi -->
    <div class="mb-4">
      <h2 class="font-bold text-lg mb-1">Visi</h2>
      <ul class="list-disc list-inside space-y-1">
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
      </ul>
    </div>

    <!-- Misi -->
    <div class="mb-4">
      <h2 class="font-bold text-lg mb-1">Misi</h2>
      <ul class="list-disc list-inside space-y-1">
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
        <li class="font-medium">Lorem ipsum dolor sit amet consectetur.</li>
      </ul>
    </div>

    <!-- Data Perusahaan -->
    <div class="space-y-4 text-sm text-black">
  <!-- Bagian Data Perusahaan -->
  <div>
    <div class="font-bold text-lg">Data Perusahaan</div>
    <div class="mt-2 space-y-1">
      <div class="flex"><div class="w-40 font-medium">User ID</div><div class="mr-1">:</div><div>7413580000</div></div>
      <div class="flex"><div class="w-40 font-medium">Username</div><div class="mr-1">:</div><div>Seven_inc</div></div>
      <div class="flex"><div class="w-40 font-medium">Email</div><div class="mr-1">:</div><div>seveninc@gmail.com</div></div>
      <div class="flex"><div class="w-40 font-medium">Kata Sandi</div><div class="mr-1">:</div><div>********</div></div>
      <div class="flex"><div class="w-40 font-medium">Nama Perusahaan</div><div class="mr-1">:</div><div>Seven INC</div></div>
      <div class="flex"><div class="w-40 font-medium">Legalitas</div><div class="mr-1">:</div><div>PT</div></div>
    </div> 
  </div>

  <!-- Bagian Kontak -->
  <div>
    <div class="font-semibold text-lg">Kontak</div>
    <div class="mt-2 space-y-1">
      <div class="flex"><div class="w-40 font-medium">Perusahaan</div><div class="mr-1 font-medium">:</div><div>(0274) 123456</div></div>
      <div class="flex"><div class="w-40 font-medium">Whatsapp</div><div class="mr-1 font-medium">:</div><div>08123456789</div></div>
    </div>
  </div>

  <!-- Bagian Lowongan -->
  <div>
    <div class="font-bold text-lg">Lowongan</div>
    <div class="mt-2 space-y-3 text-sm">
      <div>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Front-End Developer</a>
        <div class="text-gray-700 ">Yogyakarta</div>
        <div class="text-gray-500 text-xs">2 Hari yang lalu</div>
      </div>
      <div>
        <a href="#" class="text-blue-600 font-semibold hover:underline">Back - End Developer</a>
        <div class="text-gray-700">Yogyakarta</div>
        <div class="text-gray-500 text-xs">2 Hari yang lalu</div>
      </div>
      <div>
        <a href="#" class="text-blue-600 font-semibold hover:underline">UI UX Designer</a>
        <div class="text-gray-700">Yogyakarta</div>
        <div class="text-gray-500 text-xs">2 Hari yang lalu</div>
      </div>
    </div>
  </div>
</div>


    <!-- Border bawah seperti efek shadow -->
    <div class="absolute bottom-0 left-0 w-full h-1 rounded-b-lg shadow-md bg-gray-200"></div>
  </div>
</div>

<!-- 🔘 Tombol di bawah form - condong ke kanan tengah -->
<div class="flex flex-col items-center mt-8 space-y-2 transform translate-x-20">
  <button class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold py-2 px-8 rounded w-64">
    Jadikan Rekomendasi
  </button>
  <button class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold py-2 px-6 rounded w-64">
    Kembali
  </button>
</div><br>

@endsection