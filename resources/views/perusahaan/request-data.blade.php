@extends('layouts.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Request Data</title>
</head>
<body class="bg-white">

  <!-- Hero Section -->
  <div class="relative w-full h-[300px] flex items-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522202222700-7b7b46a7da3d');">
    <div class="absolute inset-0 bg-black/60"></div>
    <!-- Teks Hero -->
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-left ml-10">
      <h1 class="text-4xl font-bold text-white mb-4">Request Data</h1>
      <p class="text-white max-w-2xl text-lg">
        Lorem Ipsum is simply dummy text of the printing typesetting industry. 
        Lorem Ipsum has been industry's standard dummy text ever since the 1500s anda.
      </p>
    </div>
  </div>

  <!-- Card Section -->
  <div class="max-w-5xl mx-auto py-12 px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Card 1 -->
    <div class="bg-orange-500 rounded-2xl p-8 text-center text-white w-60 shadow-lg">
      <div class="flex justify-center mb-4">
        <!-- Icon -->
        <svg width="88" height="88" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M45.4669 31.5165H66.4669M21.5331 31.5165L24.5331 34.5165L33.5331 25.5165M45.4669 59.5165H66.4669M21.5331 59.5165L24.5331 62.5165L33.5331 53.5165M32 84H56C76 84 84 76 84 56V32C84 12 76 4 56 4H32C12 4 4 12 4 32V56C4 76 12 84 32 84Z" stroke="white" stroke-width="6.11765" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h3 class="font-medium mb-6 text-lg leading-tight">
        Laporan Harian <br>Pekerja
      </h3>
      <button class="bg-white text-orange-500 text-sm font-medium px-4 py-2 rounded-lg">
        lebih Detail
      </button>
    </div>

    <!-- Card 2 -->
    <div class="bg-orange-500 rounded-2xl p-8 text-center text-white w-60 shadow-lg">
      <div class="flex justify-center mb-4">
        <!-- Icon -->
        <svg width="82" height="84" viewBox="0 0 82 84" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M47.7279 33.7279C44.3523 37.1036 39.7739 39 35 39C30.2261 39 25.6477 37.1036 22.2721 33.7279C18.8964 30.3523 17 25.7739 17 21C17 16.2261 18.8964 11.6477 22.2721 8.27208C25.6477 4.89642 30.2261 3 35 3C39.7739 3 44.3523 4.89642 47.7279 8.27208C51.1036 11.6477 53 16.2261 53 21C53 25.7739 51.1036 30.3523 47.7279 33.7279Z" stroke="white" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M47.5553 56.8429C43.5127 55.0231 39.1574 54 35 54C28.1817 54 20.8307 56.7519 15.2005 61.2573C9.56388 65.7679 6 71.7323 6 78C6 79.6569 4.65685 81 3 81C1.34315 81 0 79.6569 0 78C0 69.3742 4.87087 61.8387 11.4517 56.5726C18.0388 51.3014 26.6878 48 35 48C40.5625 48 46.2758 49.4785 51.4211 52.0363C49.8927 53.4193 48.5844 55.0411 47.5553 56.8429Z" fill="white"/>
          <path d="M77.6253 79.6253L71.2918 73.2918M71.2918 73.2918C72.3751 72.2084 73.2345 70.9222 73.8208 69.5067C74.4072 68.0912 74.7089 66.5741 74.7089 65.042C74.7089 63.5098 74.4072 61.9927 73.8208 60.5772C73.2345 59.1617 72.3751 57.8756 71.2918 56.7922C70.2084 55.7088 68.9222 54.8494 67.5067 54.2631C66.0912 53.6768 64.5741 53.375 63.042 53.375C61.5098 53.375 59.9927 53.6768 58.5772 54.2631C57.1617 54.8494 55.8756 55.7088 54.7922 56.7922C52.6042 58.9802 51.375 61.9477 51.375 65.042C51.375 68.1362 52.6042 71.1038 54.7922 73.2918C56.9802 75.4797 59.9477 76.7089 63.042 76.7089C66.1362 76.7089 69.1038 75.4797 71.2918 73.2918Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h3 class="font-medium mb-6 text-lg leading-tight">
        Cari Nama<br>Pekerja
      </h3>
      <button class="bg-white text-orange-500 text-sm font-medium px-4 py-2 rounded-lg">
        lebih Detail
      </button>
    </div>

    <!-- Card 3 -->
    <div class="bg-orange-500 rounded-2xl p-8 text-center text-white w-60 shadow-lg">
      <div class="flex justify-center mb-4">
        <!-- Icon -->
        <svg width="103" height="100" viewBox="0 0 103 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M56.2279 40.7279C52.8523 44.1036 48.2739 46 43.5 46C38.7261 46 34.1477 44.1036 30.7721 40.7279C27.3964 37.3523 25.5 32.7739 25.5 28C25.5 23.2261 27.3964 18.6477 30.7721 15.2721C34.1477 11.8964 38.7261 10 43.5 10C48.2739 10 52.8523 11.8964 56.2279 15.2721C59.6036 18.6477 61.5 23.2261 61.5 28C61.5 32.7739 59.6036 37.3523 56.2279 40.7279Z" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M56.7148 63.4653C52.6313 61.5686 48.2169 60.5 44 60.5C37.1864 60.5 29.8574 63.2897 24.2417 67.8548C18.6237 72.4219 15 78.5194 15 85C15 86.3807 13.8807 87.5 12.5 87.5C11.1193 87.5 10 86.3807 10 85C10 76.5872 14.6793 69.1847 21.0877 63.9751C27.4986 58.7636 35.9195 55.5 44 55.5C49.2836 55.5 54.7126 56.8953 59.6302 59.3181C58.488 60.5625 57.5054 61.9557 56.7148 63.4653Z" fill="white"/>
          <path d="M75 87C83.0081 87 89.5 80.5081 89.5 72.5C89.5 64.4919 83.0081 58 75 58C66.9919 58 60.5 64.4919 60.5 72.5C60.5 80.5081 66.9919 87 75 87Z" stroke="white" stroke-width="3"/>
          <path d="M75 65.25V73.95" stroke="white" stroke-width="3" stroke-linecap="round"/>
          <path d="M74.9969 79.7516C75.7977 79.7516 76.4469 79.1024 76.4469 78.3016C76.4469 77.5007 75.7977 76.8516 74.9969 76.8516C74.1961 76.8516 73.5469 77.5007 73.5469 78.3016C73.5469 79.1024 74.1961 79.7516 74.9969 79.7516Z" fill="white"/>
        </svg>
      </div>
      <h3 class="font-medium mb-6 text-lg leading-tight">
        Laporan Harian <br>Pekerja
      </h3>
      <button class="bg-white text-orange-500 text-sm font-medium px-4 py-2 rounded-lg">
        lebih Detail
      </button>
    </div>

    </div>
  </div>

</body>
</html>



 @include('layouts.footer')
@endsection