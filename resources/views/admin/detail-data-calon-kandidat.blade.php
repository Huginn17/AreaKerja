@extends('admin.sidebar.index')
@section('sidebaradmin')

<div style="margin-left: 240px; padding: 40px; background-color: #ffffff; min-height: 100vh; font-family: Arial, sans-serif;">

  <!-- Header -->
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2 style="font-size: 20px;margin: 0;" class="font-semibold">Data Kandidat</h2>

    <!-- Profile & Notifikasi -->
    <div style="display: flex; align-items: center; gap: 16px:"class="hover:scale-105">
      <!-- Notifikasi -->
    <div style="position: relative; display: inline-block;">
  <svg width="35" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_700_14600)">
      <path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
      <path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
      <ellipse cx="21.3453" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
    </g>
    <defs>
      <clipPath id="clip0_700_14600">
        <rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.162109 4.27539)"/>
      </clipPath>
    </defs>

    <!-- Lingkaran m erah notifikasi -->
    <circle cx="25" cy="7" r="7" fill="#E46054" />
    <text x="25" y="11" text-anchor="middle" fill="white" font-size="10" font-weight="bold" font-family="Arial, sans-serif" style="user-select:none;">7</text>
  </svg>
</div>

      <!-- Profil -->
      <div style="display: flex; align-items: center; border: 1px solid #ccc; padding: 8px 12px; border-radius: 10px; background-color: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <img src="https://i.pravatar.cc/40" alt="Profile" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 10px;">
        <div>
          <div style="font-size: 14px; font-weight: bold;">Ronaldo</div>
          <div style="font-size: 12px; color: gray;">ronaldo@gmail.com</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kartu Kandidat -->
<div style="margin: 0 auto; background-color: #5c5c5c; border-radius: 10px; color: white; padding: 50px 50px; max-width: 950px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
  <div style="display: flex; align-items: center; margin-bottom: 50px;">
    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto" style="width: 90px; height: 90px; border-radius: 50%; margin-right: 25px;">
    <h3 style="font-size: 29px; font-weight: bold; margin: 1;">Ariefin Cahya Nugroho</h3>
  </div>

  <div style="display: flex; justify-content: space-between;">
    <div>
      <div style="font-size: 16px; color: rgb(255, 253, 253);"class="m-2">Divisi</div>
      <div style="font-size: 16px;">Programmer</div>
    </div>
    <div>
      <div style="font-size: 16px; color: rgb(255, 253, 253);" class="m-2">Mulai Pelatihan</div>
      <div style="font-size: 16px;">20 Oktober 2023</div>
    </div>
    <div>
      <div style="font-size: 16px; color: rgb(255, 253, 253);" class="m-2">Selesai Pelatihan</div>
      <div style="font-size: 16px;">20 Desember 2023</div>
    </div>
  </div>
</div>



  <!-- Tombol Aksi -->
  <div style="margin-top: 30px; text-align: center;">
   <button 
  style="background-color: #22c55e; color: white; border: none; padding: 10px 200px; border-radius: 8px; font-weight: bold; font-size: 14px; margin-bottom: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer;"
  onmouseover="this.style.backgroundColor='#86efac'" 
  onmouseout="this.style.backgroundColor='#22c55e'">
  Lulus
</button>

    </button><br>
    <button 
  style="background-color: #dc2626; color: white; border: none; padding: 10px 200px; border-radius: 8px; font-weight: bold; font-size: 14px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer;"
  onmouseover="this.style.backgroundColor='#f87171';" 
  onmouseout="this.style.backgroundColor='#dc2626';">
  Gugur
</button>
    
  </div>

</div>

@endsection
