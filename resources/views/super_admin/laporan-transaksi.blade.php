@extends('finance.sidebar.index')
@section('sidebar')
    
<div class="max-w-5xl mx-auto p-6 translate-x-40 overflow-y-auto">
  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Laporan Transaksi</h1>

    <!-- Profile Box -->
    <div class="flex items-center gap-3">
      <!-- Icon Notifikasi -->
   <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_740_12732)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3472" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_740_12732">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27539)"/>
</clipPath>
</defs>
</svg>


      <div class="flex items-center bg-white border border-orange-500 shadow-md rounded-2xl px-4 py-2">
        <img src="{{asset('images/seven.png')}}" class="w-10 h-10 object-contain" alt="User">
        <div class="ml-2 text-sm">
          <div class="font-semibold">Seven Inc</div>
          <div class="text-gray-500 text-xs">financeseven@gmail.com</div>
        </div>
            <!-- Dropdown -->
                    <select class="appearance-none text-gray-600 text-xs px-8 focus:outline-none cursor-pointer">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
      </div>
    </div>
  </div>

  <!-- Submenu Button -->
 <select
  class="bg-orange-500 text-white px-4 py-2 rounded-md font-medium focus:outline-none mb-4">
  <option value="laporan">Laporan</option>
  <option value="riwayat">Riwayat</option>
  <option value="paket_harga">Paket Harga</option>
</select>


  <!-- Description -->
  <h3 class="font-semibold text-lg">Catatan Transaksi Penghasilan</h3>
  <p class="text-gray-600 mb-6 text-sm">

    Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan. Silahkan download salinan PDF anda.
  </p>

  <!-- Riwayat Koin Box -->
  <div class="bg-orange-500 rounded-lg p-9">
    <h2 class="text-white font-semibold text-lg mb-4">Riwayat Koin</h2>

    <!-- Filters -->
    <div class="flex gap-3 mb-4">
      <select
        class="w-32 bg-white text-orange-500 text-sm font-medium px-3 py-2 border rounded-lg focus:outline-none">
        <option class="font-semibold">Bulan</option>
        <option class="font-semibold">Januari</option>
        <option class="font-semibold">Februari</option>
        <option class="font-semibold">Maret</option>
        <option class="font-semibold">April</option>
        <option class="font-semibold">Mei</option>
        <option class="font-semibold">Juni</option>
        <option class="font-semibold">Juli</option>
        <option class="font-semibold">Agustus</option>
      </select>
      <select
        class="w-32 bg-white text-orange-500 text-sm font-medium px-3 py-2 border rounded-lg focus:outline-none">
        <option class="font-semibold">Tahun</option>
        <option class="font-semibold">2020</option>
        <option class="font-semibold">2021</option>
        <option class="font-semibold">2022</option>
        <option class="font-semibold">2023</option>
        <option class="font-semibold">2024</option>
        <option class="font-semibold">2025</option>
      </select>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-white text-orange-500">
          <tr>
            <th class="px-4 py-3">Catatan Transaksi</th>
            <th class="px-4 py-3">Pendapatan</th>
            <th class="px-4 py-3">Koin</th>
            <th class="px-4 py-3">Tanggal</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y  border-4">
          <tr>
            <td class="px-4 py-3 font-semibold">Catatan_Transaksi_November</td>
            <td class="px-4 py-3 font-semibold">100.000.000</td>
            <td class="px-4 py-3 font-semibold">100.000</td>
            <td class="px-4 py-3 font-semibold">25 Januari 2024</td>
            <td class="px-4 py-3 text-orange-500">
              <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z" fill="#FA6601"/>
</svg>
            </td>
          </tr>

<tbody class="border-4">
          <tr>
            <td class="px-4 py-3 font-semibold">Catatan_Transaksi_November</td>
            <td class="px-4 py-3 font-semibold">100.000.000</td>
            <td class="px-4 py-3 font-semibold">100.000</td>
            <td class="px-4 py-3 font-semibold">25 Januari 2024</td>
            <td class="px-4 py-3 text-orange-500">
              <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z" fill="#FA6601"/>
</svg>

            </td>
          </tr>

          <tbody class="border-4">
          <tr>
            <td class="px-4 py-3 font-semibold">Catatan_Transaksi_November</td>
            <td class="px-4 py-3 font-semibold">100.000.000</td>
            <td class="px-4 py-3 font-semibold">100.000</td>
            <td class="px-4 py-3 font-semibold">25 Januari 2024</td>
            <td class="px-4 py-3 text-orange-500">
              <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z" fill="#FA6601"/>
</svg>

            </td>
          </tr>


          <tbody class="border-4">
          <tr>
            <td class="px-4 py-3 font-semibold">Catatan_Transaksi_November</td>
            <td class="px-4 py-3 font-semibold">100.000.000</td>
            <td class="px-4 py-3 font-semibold">100.000</td>
            <td class="px-4 py-3 font-semibold">25 Januari 2024</td>
            <td class="px-4 py-3 text-orange-500">
              <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z" fill="#FA6601"/>
</svg>

            </td>
          </tr>



          <tbody class="border-4">
          <tr>
            <td class="px-4 py-3 font-semibold">Catatan_Transaksi_November</td>
            <td class="px-4 py-3 font-semibold">100.000.000</td>
            <td class="px-4 py-3 font-semibold">100.000</td>
            <td class="px-4 py-3 font-semibold">25 Januari 2024</td>
            <td class="px-4 py-3 text-orange-500">
              <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z" fill="#FA6601"/>
</svg>

            </td>
          </tr>
          <!-- duplikat baris sesuai kebutuhan -->
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
