@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
<div style="margin-left: 60px; padding: 40px; min-height: 100vh; background-color: #ffffff; font-family: Arial, sans-serif;">

  <!-- Header -->
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2 style="font-size: 20px; font-weight: 600; margin: 0;">Data Kandidat</h2>

    <div style="display: flex; align-items: center; gap: 16px;">
      <!-- Notifikasi -->
      <svg width="30" height="30" fill="black" viewBox="0 0 24 24">
        <path d="M12 2a7 7 0 0 1 7 7v5.586l1.707 1.707A1 1 0 0 1 20.586 18H3.414a1 1 0 0 1-.707-1.707L4.414 14.586V9a7 7 0 0 1 7-7zm0 20a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2z"/>
      </svg>

      <!-- Profile -->
      <div style="display: flex; align-items: center; border: 1px solid #ddd; padding: 8px 12px; border-radius: 10px; background-color: #fff; box-shadow: 0 1px 4px rgba(0,0,0,0.1);">
        <img src="https://i.pravatar.cc/40" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 10px;" alt="Profile">
        <div>
          <div style="font-size: 14px; font-weight: bold;">Steve Jobs</div>
          <div style="font-size: 12px; color: gray;">stevejobs@gmail.com</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kartu Kandidat -->
  <div style="width: 125%; background-color: #f56600; border-radius: 16px; color: white; padding: 70px 70px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); box-sizing: border-box;">
    <div style="display: flex; align-items: center; margin-bottom: 40px;">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto" style="width: 100px; height: 100px; border-radius: 50%; margin-right: 30px;">
      <h3 style="font-size: 28px; font-weight: bold; margin: 0;">Ariefin Cahya Nugroho</h3>
    </div>

    <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
      <div style="min-width: 200px;">
        <div style="font-size: 16px;">Divisi</div>
        <div style="font-size: 18px;">Programmer</div>
      </div>
      <div style="min-width: 200px;">
        <div style="font-size: 16px;">Mulai Pelatihan</div>
        <div style="font-size: 18px;">20 Oktober 2023</div>
      </div>
      <div style="min-width: 200px;">
        <div style="font-size: 16px;">Selesai Pelatihan</div>
        <div style="font-size: 18px;">20 Desember 2023</div>
      </div>
    </div>
  </div>

  <!-- Tombol Aksi -->
  <div style="width: 120%; text-align: center; margin-top: 30px;">
    <button
  style="background-color: #22c55e; color: white; border: none; padding: 10px 200px; border-radius: 8px; font-weight: bold; font-size: 16px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); cursor: pointer;"
  onmouseover="this.style.backgroundColor='#86efac';"
  onmouseout="this.style.backgroundColor='#22c55e';"
>
  Lulus
</button>

    <br>
    <button
  style="background-color: #dc2626; color: white; border: none; padding: 10px 200px; border-radius: 8px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); cursor: pointer;"
  onmouseover="this.style.backgroundColor='#f87171';"
  onmouseout="this.style.backgroundColor='#dc2626';"
>
  Gugur
</button>


  </div>

</div>
@endsection
