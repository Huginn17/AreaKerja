@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')




<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lowongan Kerja - Areakerja</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <!-- ✅ KONTEN LOWONGAN TETAP -->
    <main class="flex-1 p-6 overflow-y-auto">
      <div class="max-w-3xl mx-auto border border-gray-300 rounded-lg shadow p-4 bg-white max-h-[600px] overflow-y-auto">

        <!-- Header Lowongan -->
        <div class="relative flex items-center p-5 mb-5 shadow-lg">
          <img src="{{ asset('images/seven.png') }}"alt="Seven Logo"class="w-16 h-16 object-contain"/>
          
          <h1 class="flex-grow text-center font-semibold text-base">Front–End Developer</h1>

          <button
            type="button"
            class="absolute top-2 right-2 flex items-center gap-1 text-xs text-gray-600 rounded border border-gray-200 px-3 py-1 hover:bg-gray-50 transition">
            <span class="text-red-500">📢</span>
            <span>Steve Jobs</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
        </div>

        <!-- Aksi Lowongan -->
        <div class="flex justify-end gap-4 text-xs text-orange-600 mb-4">
          <button class="hover:underline flex items-center gap-1">
            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<mask id="mask0_733_9200" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="20">
<rect width="20.0843" height="19.8054" fill="url(#pattern0_733_9200)"/>
</mask>
<g mask="url(#mask0_733_9200)">
<rect width="20.0843" height="19.8054" fill="#FF6109"/>
</g>
<defs>
<pattern id="pattern0_733_9200" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_733_9200" transform="matrix(0.010272 0 0 0.0104167 0.00694319 0)"/>
</pattern>
<image id="image0_733_9200" width="96" height="96" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABZ0lEQVR4nO3dMU7DQBBG4R+k3AVySkoKQHAb4BrcgCOQMkihcApEA3Fm8tbhfdK2q/W8xHLkIokkSZIkjeUmye7IdXvyU5+JiuEbYabK4RvhQB3DHzbCRcEeu4I9luyoGV5WnULzGABmAJgBYAaAGQBmAEmSJEk6sYr3AT+d+/uB0pn5SxhmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYAaAGQBmAJgBYB0BNg17juKjesOOAO8Ne46i/No6Arw27DmKZ/oAf7FO8pm+/wKj1jbJVeGcWj2FH1j1eiidULNVplsRPbSq9bK/pkVZJXnM9NWlBzh3bTN98hc3/O/WSe6TvGV6RKWH+tva7M96l+S6YR6SJEmS/rkvrDJThoEm4u8AAAAASUVORK5CYII="/>
</defs>
</svg>
 hapus lowongan
          </button>
          <button class="hover:underline flex items-center gap-1">
            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<mask id="mask0_733_9205" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="23">
<rect x="0.0859375" width="22.6236" height="22.3094" fill="url(#pattern0_733_9205)"/>
</mask>
<g mask="url(#mask0_733_9205)">
<rect x="0.0859375" width="22.6236" height="22.3094" fill="#FF6109"/>
</g>
<defs>
<pattern id="pattern0_733_9205" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_733_9205" transform="matrix(0.010272 0 0 0.0104167 0.00694314 0)"/>
</pattern>
<image id="image0_733_9205" width="96" height="96" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABtklEQVR4nO3aMU7DMBiG4Q9YGOAM3IOJQyCuwtgsSByJBQkheoQepBNjGaBShQKJ7d/+6uZ9JI+NnPdvmrSqBAAAAAA49CBpLWkraSPpSdKldUcLspK0G1nvkq6M+1qEQePx92st6dq2uxM3FZ8hVDQ3PkOoIDU+QwiUG58hBCiNXzSE8+Lt9+8z6Di3kl7ElZDlUTFXAR9HBRjCEYi6H+y/MU/+bHERfQade5N0Juku4Fg3+u77GnCsxYn6ONq03vixGn5W6mtKB7AN2Hv3DkO2HsJH+fb7Nhaw5RDui8+gY/+FazGEVfEZdGxOsOfEY6bcmIk/c9UYAvETV+QQiJ+5IoZA/MJVMgTiB62cp6PU15yUyPi5V8Ji1YjPEGaqGZ8hTGgRnyH8oWV8hvCLI371IfTyr4hB3mftqH9OdMn5zt+JL1nEdyG+EfGNiG9EfCPiGxHfiPhGxDcivhHxjYhvRHwj4hsR34j4RsQ3Ir4R8Y2Ib0R8I+IbEd+I+EbENyK+EfGNiG9GfDPimxHfjPhmxDcjvhnxzYhvRnwz4psR34z4ZsQ3I74Z8c2IDwAAAAAAAGT4AmWLJrfB4zyeAAAAAElFTkSuQmCC"/>
</defs>
</svg>
 edit lowongan
          </button>
        </div>

        <!-- Detail Lowongan -->
        <div class="text-sm text-gray-900 leading-relaxed space-y-4">
          <div><p class="font-semibold text-lg m-2">Detail Lowongan</p></div>

          <div>
            <p class="font-semibold text-lg m-2">Gaji</p>
            <p>Rp.2.500.000 – Rp.4.500.000 per bulan</p>
          </div>

          <div>
            <p class="font-semibold text-lg m-2">Jenis Lowongan</p>
            <p>Full Time</p>
          </div>

          <div>
            <p class="font-semibold text-lg m-2">Deskripsi Pekerjaan</p>
            <ul class="list-disc list-inside space-y-1">
              <li>Good personality, good attitude</li>
              <li>Memiliki pengalaman web Programming</li>
              <li>Memahami desain afd dan erd</li>
              <li>Mampu mengimplementasikan desain ui/ux</li>
              <li>Menguasai HTML5, CSS3 dan JSX</li>
              <li>Memahami GIT</li>
              <li>Work From Office. Yogyakarta</li>
            </ul>
          </div>

          <div>
            <p class="font-semibold text-lg m-2">Syarat Pekerjaan</p>
            <ul class="list-disc list-inside space-y-1">
              <li>Minimal pendidikan SMA/SMK</li>
              <li>Laki-laki, Perempuan</li>
              <li>Umur 18–30</li>
              <li>Batas lamaran hingga dd/mm/yyyy</li>
            </ul>
          </div>

          <div>
            <p class="font-semibold text-lg m-2">Aktivitas Lowongan</p>
            <p>Lowongan dipasang 2 hari yang lalu</p>
          </div>
        </div>

      </div>
    </main>
  </div>

</body>
</html>


@endsection
