<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan Omset</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="max-w-3xl mx-auto p-10 font-sans text-black text-sm">

    <!-- Header -->
    <div class="flex justify-between items-center mb-2">
        <div class="space-y-1">
            <p class="text-lg font-semibold"><span class="inline-block w-20 font-semibold text-lg">Email</span>:
                Areakerja@gmail.com</p>
            <p class="text-lg font-semibold"><span class="inline-block w-20 font-semibold text-lg">Telepon</span>:
                081234567009</p>
        </div>
        <div class="flex items-center space-x-2 text-orange-500 font-bold text-lg">
            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="h-10" />
            <span class="text-xl">areakerja.com</span>
        </div>
    </div>

    <!-- Orange underline -->
    <hr class="border-t-4 border-orange-500 mb-5" />

    <!-- Title -->
    <h2 class="text-center font-bold mb-5 text-xl">LAPORAN OMSET PERUSAHAAN</h2>

    <!-- Table -->
    <table class="w-full border-2 border-black border-collapse text-xs">
        <thead>
            <tr class="bg-orange-500 text-white text-center">
                <th class="border-2 border-black px-3 py-1 w-12  text-lg">No.</th>
                <th class="border-2 border-black px-3 py-1  text-lg">Bulan</th>
                <th class="border-2 border-black px-3 py-1 text-lg">Nominal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">1.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Januari 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">2.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Februari 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">3.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Maret 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">4.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">April 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">5.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Mei 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">6.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Juni 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center  font-semibold text-lg">7.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Juli 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">8.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">Agustus 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">9.</td>
                <td class="border-2 border-black px-3 py-1  text-lg font-semibold">September 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold text-lg">10.</td>
                <td class="border-2 border-black px-3 py-1 text-lg font-semibold">Oktober 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
            <tr>
                <td class="border-2 border-black px-3 py-1 text-center font-semibold  text-lg">11.</td>
                <td class="border-2 border-black px-3 py-1 text-lg font-semibold">November 2023</td>
                <td class="border-2 border-black px-3 py-1 text-center text-lg font-semibold">Rp 3.000.000,00</td>
            </tr>
        </tbody>
    </table>


    <!-- Summary -->
    <div class="mt-6 text-sm space-y-1">
        <p class="text-lg font-semibold"><span class="inline-block w-28 text-lg font-semibold"">Jumlah Bulan</span> : 11
        </p>
        <p class="text-lg font-semibold""><span class="inline-block w-28 text-lg font-semibold"">Total Omset</span> : Rp
            33.000.000,00</p>
        <p class="text-lg font-semibold""><span class="inline-block w-28 text-lg font-semibold"">Rata-rata</span> : Rp
            3.000.000,00</p>
    </div><br>

    <!-- Footer -->
    <div class="mt-10 pt-4 border-t-2 border-black w-full text-lg">
        <div class="flex justify-between items-start">
            <div>
                <p class="font-bold text-lg">Areakerja.com</p>
                <p class="text-gray-500 text-lg">Alamat dari Areakerja.com</p>
            </div>
            <div class="text-right">
                <p class="text-lg">July 30, 2023, 10.35 am</p>
            </div>
        </div>
    </div>

</body>

</html>
