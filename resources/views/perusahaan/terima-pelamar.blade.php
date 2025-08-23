@extends('layouts.index-perusahaan')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title class="font-italic">Konfirmasi Terima Lamaran</title>
</head>
<body style="font-family: Arial, sans-serif; background:#fff; margin:0; padding:0;">

  <!-- Judul di luar border -->
  <h2 style="font-size:18px; font-weight:bold; margin:40px auto 10px auto; width:90%; max-width:750px;">
    Konfirmasi Terima Lamaran
  </h2>

  <!-- Kotak form -->
  <div style="width:90%; max-width:750px; margin:0 auto 50px auto; border:1px solid #ccc; border-radius:10px; padding:20px 30px;">
    <p class="font-semibold">Silahkan input jadwal wawancara untuk calon kandidat</p><br>

  <form class="space-y-5">
  <!-- Tanggal -->
  <div class="w-1/2"> <!-- biar agak pendek ke samping kiri -->
    <label class="block text-sm font-semibold mb-2">
      Tanggal <span class="text-red-500">*</span>
    </label>
    <input type="date" 
           class="w-full h-9 border border-gray-300 rounded-md px-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400" />
  </div>
  

      <!-- Waktu -->
      <label style="display:block; font-size:14px; margin-bottom:6px; font-weight:600;">
        Waktu <span style="color:red">*</span>
      </label>

      <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
        <!-- Jam -->
        <div style="position:relative; display:inline-block;">
          <select style="width:70px; padding:6px; font-size:14px; border:1px solid #ccc; border-radius:6px; appearance:none; background:white; text-align:center; cursor:pointer;">
            <option>00</option><option>01</option><option>02</option><option>03</option>
            <option>04</option><option>05</option><option>06</option><option>07</option>
            <option>08</option><option>09</option><option>10</option><option>11</option>
            <option>12</option><option>13</option><option>14</option><option>15</option>
            <option>16</option><option>17</option><option>18</option><option>19</option>
            <option>20</option><option>21</option><option>22</option><option>23</option>
          </select>
          <!-- Panah Oranye -->
          <svg style="position:absolute; right:10px; top:50%; transform:translateY(-50%); pointer-events:none;" width="16" height="16" viewBox="0 0 24 24" fill="orange">
            <path d="M7 10l5 5 5-5z"/>
          </svg>
        </div>

        <span style="font-size:18px;">:</span>

        <!-- Menit -->
        <div style="position:relative; display:inline-block;">
          <select style="width:70px; padding:6px; font-size:14px; border:1px solid #ccc; border-radius:6px; appearance:none; background:white; text-align:center; cursor:pointer;">
            <option>00</option><option>15</option><option>30</option><option>45</option>
          </select>
          <!-- Panah Oranye -->
          <svg style="position:absolute; right:10px; top:50%; transform:translateY(-50%); pointer-events:none;" width="16" height="16" viewBox="0 0 24 24" fill="orange">
            <path d="M7 10l5 5 5-5z"/>
          </svg>
        </div>
      </div>

      <!-- Tempat -->
      <label style="display:block; font-size:14px; margin-bottom:6px; font-weight:600;">
        Tempat <span style="color:red">*</span>
      </label>
      <textarea style="width:100%; padding:8px 10px; font-size:14px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px; resize:none; min-height:70px;">Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta, 13463</textarea>

      <!-- Catatan -->
      <label style="display:block; font-size:14px; margin-bottom:6px; font-weight:600;">
        Catatan <span style="color:red">*</span>
      </label>
      <textarea style="width:100%; padding:8px 10px; font-size:14px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px; resize:none; min-height:90px;">Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta, 13463</textarea>

      <!-- Button -->
      <button type="submit" style="display:block; margin:10px auto 0 auto; padding:8px 25px; background-color:#ff6500; background-hover:#ff6600 border:none; color:#fff; font-size:14px; font-weight:600; border-radius:6px; cursor:pointer;">
        Selanjutnya
      </button>
    </form>
  </div>

</body>
</html>

  @include('layouts.footer')
@endsection