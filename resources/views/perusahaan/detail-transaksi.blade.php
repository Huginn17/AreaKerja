<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-[400px] bg-white shadow-md rounded-2xl p-11 text-center scale-90">

        <!-- Judul -->
        <h2 class="text-lg font-semibold mb-3">Top Up Berhasil</h2>

        <!-- Icon centang -->
        <div class="flex justify-center mb-4">
            <div class="w-11 h-11 flex items-center justify-center rounded-full bg-orange-200">
                <div class="w-7 h-7 flex items-center justify-center rounded-full bg-orange-500 text-white">
                    <svg width="17" height="11" viewBox="0 0 24 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.34402 14.0281L2.52424 9.52938C2.26453 9.28697 1.91229 9.15079 1.545 9.15079C1.17772 9.15079 0.825478 9.28697 0.565769 9.52938C0.306059 9.77178 0.160156 10.1006 0.160156 10.4434C0.160156 10.6131 0.195977 10.7812 0.265572 10.938C0.335167 11.0948 0.437174 11.2373 0.565769 11.3574L6.37173 16.7765C6.91343 17.2821 7.78849 17.2821 8.3302 16.7765L23.0257 3.0601C23.2854 2.81769 23.4313 2.48892 23.4313 2.1461C23.4313 1.80329 23.2854 1.47451 23.0257 1.23211C22.766 0.989699 22.4137 0.853516 22.0464 0.853516C21.6791 0.853516 21.3269 0.989699 21.0672 1.23211L7.34402 14.0281Z"
                            fill="white" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex justify-beetwen justify-center mb-6">
            <p class="text-4xl font-medium text-yellow-500">+100</p>
            <img src="{{ asset('images/bitcoin.png') }}" alt="coin" class="w-6 h-6 ml-2 mt-2">
        </div>

        <!-- Detail transaksi -->
        <div class="space-y-6 text-sm text-left font-medium">
            <div class="flex justify-between">
                <span>No. Transaksi</span>
                <span>081769876982</span>
            </div>
            <div class="flex justify-between">
                <span>Status</span>
                <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-normal">Berhasil</span>
            </div>
            <div class="flex justify-between">
                <span>Jenis Transaksi</span>
                <span>Top Up Koin</span>
            </div>
            <div class="flex justify-between">
                <span>Nama Pengirim</span>
                <span>Seven Inc</span>
            </div>
            <div class="flex justify-between">
                <span>Nama Penerima</span>
                <span>Area Kerja</span>
            </div>
            <div class="flex justify-between">
                <span>Metode Pembayaran</span>
                <span>BCA</span>
            </div>
            <div class="flex justify-between">
                <span>Tgl/Waktu</span>
                <span>25 Juni 12:30 WIB</span>
            </div>
            <div class="flex justify-between">
                <span>Jumlah Deposito</span>
                <span>Rp. 100.000</span>
            </div>

            <div class="ml-3">
                <svg width="290" height="2" viewBox="0 0 290 2" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="1.25" x2="290" y2="1.25" stroke="black" stroke-width="1.5"
                        stroke-dasharray="6 6" />
                </svg>
            </div>
        </div>

        <!-- Garis putus-putus -->
        <div class="border-t border-dashed mt-6"></div>

        <!-- Total -->
        <div class="flex justify-between text-sm font-semibold">
            <span>Total Pembayaran</span>
            <span>Rp. 100.000</span>
        </div>

        <!-- Footer -->
        <div class="flex flex-col items-center justify-center mt-10 text-xs text-black">
            <img src="{{ asset('images/logoarea.png') }}" alt="Logo Areakerja" class="w-20 h-auto">
            Copyright &copy; AREAKERJA.com
        </div>



    </div>

</body>

</html>
