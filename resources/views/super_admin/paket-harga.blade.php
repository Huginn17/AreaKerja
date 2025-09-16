@extends('finance.sidebar.index')
@section('sidebar')


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paket Harga</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black">

  <div class="max-w-4xl mx-auto p-6 translate-x-40 overflow-y-auto">
       <h3 class="text-xl font-semibold mb-3">Paket Harga</h3>


</form>
    <!-- Header -->
    <div class="flex items-center justify-between mb-5">
      <!-- Title -->

        <form action="/submit" method="POST" class="flex items-center gap-3">
          
  <!-- Dropdown -->
  <select id="menu_select" name="menu_select"
          class="w-48 bg-orange-500 text-white font-medium px-4 py-2 border border-orange-500 rounded-lg focus:outline-none">
      <option value="riwayat">Riwayat</option>
      <option value="paket_harga">Paket Harga</option>
      <option value="laporan">Laporan</option>
  </select>
</form>
    </button>

      <!-- Profile Box -->
      <div class="flex items-center gap-3">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    class="flex items-center justify-between w-30 h-12 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
                    <!-- Logo + Info -->
                    <div class="flex items-center gap-2 mr-2">
                        <a href="#">
                            <img src="{{ asset('images/seven.png') }}" class="w-16 h-16 object-contain" alt="User">
                        </a>
                        <div class="text-sm">
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
    </div><br>

   
    <!-- Tabel Paket Harga -->
    <div class="  overflow-y-auto">
      <div class="flex items-center justify-between px-5 py-3">
        <h2 class="text-base font-semibold">Paket Harga Koin</h2>
        <button class="bg-orange-500 text-white text-sm font-medium px-7 py-1 rounded-lg hover:bg-orange-600 focus:outline-none">
          Edit
        </button>
      </div>

      <!-- Table -->
      <div class="px-15 pb-5">
        <div class="overflow-x-auto">
          <table class="min-w-full border-rounded-lg text-base border-2 border-rounded-lg">
            <!-- Table Head -->
            <thead>
              <tr class="border rounded-lg">
                <th class="bg-orange-500 text-white text-left px-4 py-3 rounded-tl-md">Nama</th>
                <th class="bg-orange-500 text-white text-right px-4 py-3 rounded-tr-md">Harga</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200 border-gray-500 border-t">
              <tr>
                <td class="px-4 py-3 font-semibold">Pasang Lowongan Bronze</td>
                <td class="px-4 py-3 text-right font-semibold">150 Koin</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Pasang Lowongan Silver</td>
                <td class="px-4 py-3 text-right font-semibold">150 Koin</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Pasang Lowongan Gold</td>
                <td class="px-4 py-3 text-right font-semibold">150 Koin</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold" >Open Talent Hunter</td>
                <td class="px-4 py-3 text-right font-semibold">150 Koin</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Open CV</td>
                <td class="px-4 py-3 text-right font-semibold">150 Koin</td>
              </tr>
              <tr>
                <td class="px-4 py-3 rounded-bl-md font-semibold">Berlangganan</td>
                <td class="px-4 py-3 text-right rounded-br-md font-semibold">150 Koin</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


      <!-- Tabel Paket Harga -->
    <div class="  overflow-y-auto">
      <div class="flex items-center justify-between px-5 py-3">
        <h2 class="text-base font-semibold">Paket Harga Pembayaran</h2>
        <button class="bg-orange-500 text-white text-sm font-medium px-7 py-1 rounded-lg hover:bg-orange-600 focus:outline-none">
          Edit
        </button>
      </div>

      <!-- Table -->
      <div class="px-15 pb-5">
        <div class="overflow-x-auto">
          <table class="min-w-full border-rounded-lg text-base border rounded-lg">
            <!-- Table Head -->
            <thead>
              <tr class="border rounded-lg">
                <th class="bg-orange-500 text-white text-left px-4 py-3 rounded-tl-md">Nama</th>
                <th class="bg-orange-500 text-white text-right px-4 py-3 rounded-tr-md">Harga</th>
              </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200 border-gray-500 border-t">
              <tr>
                <td class="px-4 py-3 font-semibold">Pendaftaran Kandidat</td>
                <td class="px-4 py-3 text-right font-semibold">Rp. 20.000</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Top Up 10 Koin Areakerja</td>
                <td class="px-4 py-3 text-right font-semibold">Rp. 10.000</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Top Up 100 Koin Areakerja </td>
                <td class="px-4 py-3 text-right font-semibold">Rp. 100.000</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Top Up 1.000 Koin Areakerja/td>
                <td class="px-4 py-3 text-right font-semibold">Rp. 500.000</td>
              </tr>
              <tr>
                <td class="px-4 py-3 font-semibold">Top Up 10.000 Koin Areakerja </td>
                <td class="px-4 py-3 text-right font-semibold">Rp. 1.000.000</td>
              </tr>
              <tr>
                <td class="px-4 py-3 rounded-bl-md font-semibold">Top Up 100.000 Koin Areakerja</td>
                <td class="px-4 py-3 text-right rounded-br-md font-semibold">Rp. 1.500.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
@endsection

