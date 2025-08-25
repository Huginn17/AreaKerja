@extends('layouts.index-perusahaan')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-white">
  <div class="bg-white border border-gray-230 rounded-2xl shadow-sm w-full max-w-lg flex flex-col items-center justify-center py-20 px-20">
    
    <!-- Icon Amplop Terbuka Mirip Gambar -->
   <svg width="110" height="110" viewBox="0 0 150 139" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M147.433 47.1239L78.2019 0.970095C77.2539 0.337562 76.1397 0 75 0C73.8603 0 72.7461 0.337562 71.7981 0.970095L2.56731 47.1239C1.777 47.6512 1.12914 48.3655 0.681273 49.2034C0.233403 50.0413 -0.000615858 50.9768 1.2172e-06 51.9268V126.927C1.2172e-06 129.987 1.21566 132.922 3.37954 135.086C5.54342 137.25 8.47827 138.465 11.5385 138.465H138.462C141.522 138.465 144.457 137.25 146.62 135.086C148.784 132.922 150 129.987 150 126.927V51.9268C150.001 50.9768 149.767 50.0413 149.319 49.2034C148.871 48.3655 148.223 47.6512 147.433 47.1239ZM52.4423 92.3115L11.5385 121.158V63.1263L52.4423 92.3115ZM64.2476 98.0807H85.7524L126.591 126.927H23.4087L64.2476 98.0807ZM97.5577 92.3115L138.462 63.1263V121.158L97.5577 92.3115Z" fill="#606060" fill-opacity="0.8"/>
</svg><br>


    <!-- Teks -->
    <p class="text-gray-500 text-center text-lg font-medium leading-relaxed">
      Tidak Ada Event Yang Tersedia <br>
      Untuk Saat Ini
    </p>
  </div>
</div>

 @include('layouts.footer')
    @endsection