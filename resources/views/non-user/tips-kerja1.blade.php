@extends('layouts.index')
@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <!-- Gambar Header -->
        <div class="mb-6">
            <img src="{{ asset('images/cwe.png') }}" alt="Artikel Header"
                class="w-full h-72 object-cover rounded-lg shadow">
        </div>

          <div class="max-w-3xl mx-auto p-4">
    <!-- Label Tips & Top News -->
    <div class="flex items-center gap-2 mb-3">
        <span class="px-7 py-1 hover:bg-gray-100 border border-black rounded-full text-sm">
            Tips
        </span>
        <span class="px-3 py-1 bg-orange-500 hover:bg-orange-600 text-white rounded-full text-sm">
            Top News
        </span>
    </div>

    <!-- Judul -->
    <h2 class="text-2xl font-serif font-bold leading-snug">
        4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
    </h2>

    <!-- Footer -->
    <div class="flex items-center justify-between mt-4">
        <span class="text-orange-500 hover:text-orange-600 font-semibold">Areakerja.com</span>

        <div class="flex items-center gap-4 text-sm text-gray-600">
            <button class="bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full">
                ➔
            </button>
            <span>Kamis, 27 Oktober 13:00 WIB</span>
        </div>
        
    </div>
</div>

  
  <div class="max-w-3xl mx-auto px-4 py-6 text-justify leading-relaxed font-medium text-gray-900">
    <p class="mb-4">
        Mau mendapatkan penghasilan tambahan? Ingin dapat pengalaman dari luar pekerjaan utama?
    </p>

    <p class="mb-4">Tentu saja, kamu bisa mencari pekerjaan freelance atau pekerja lepas sebagai salah satu solusi untuk mendapatkan pemasukan di luar pendapatan utama kamu.</p>

    <p class="mb-4">Atau mungkin buat kamu yang masih ingin mendapatkan pengalaman di dunia pekerjaan, tentu saja kerja freelance adalah jawabannya.</p>

    <p class="mb-4">Hanya saja, dari sekian banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan di masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.</p>

    <p class="mb-4">Lalu, apa saja sih tipe pekerjaan yang menjanjikan sebagai freelance itu? Penasaran ya?</p>

    <p class="mb-4">Tak perlu berlama-lama, berikut ini adalah beberapa jenis kerja freelance terbaik yang sanggup memberikan keuntungan finansial buat kamu.</p>

    <h2 class="text-xl font-semibold">Jenis Pekerjaan Freelance yang Menguntungkan</h2><br>

    <h2 class="font-semibold">1. Penulis Konten Lepas</h3><br>

    <!-- Ganti src dengan file gambar lokal jika perlu -->
    <img src="{{ asset('images/gambar1.jpg') }}" alt="Gambar Tidak Ada"><br>

    <p class="mb-4">Penulis konten atau bahasan kerennya <strong>Content Writer</strong> merupakan satu dari sekian banyak pekerjaan freelance yang sanggup memberikan Anda pemasukan yang menguntungkan.</p>

    <p class="mb-4">Hal itu tak lepas dari kebutuhan perusahaan dari berbagai bidang industri yang tentunya membutuhkan sebuah tulisan artikel untuk dimuat di web atau situs mereka.</p>

    <p class="mb-4">Apalagi, di era yang serba digital seperti sekarang ini, tentu saja menjadi salah satu kesempatan untuk kamu yang punya bakat dan minat dalam bidang tulis menulis.</p>

    <p class="mb-4">Mengingat, ke depan akan banyak perusahaan yang tentu membutuhkan penulis konten untuk setiap produknya. Baik itu konten pemasaran, konten deskripsi, maupun konten tulisan artikel pada sebuah website.</p>
  </div>



</div>

    </div>

    <!-- Floating Button -->
    <a href="#top"
        class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg">
        ↑
    </a>
    @include('layouts.footer')
@endsection
