@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-5xl mx-auto bg-white p-10">
        <!-- Bagian Atas -->
        <div class="grid grid-cols-2 gap-8 mb-10">
            <!-- Logo Perusahaan -->
            <div>
                <label class=" text-lg font-medium mb-3">Logo Perusahaan</label>
                <div class="flex gap-6 items-center">
                    <!-- Logo -->
                    <div class="w-48 h-48 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="object-contain h-full">
                    </div>
                    <!-- Tombol Upload & Remove -->
                    <div class="flex flex-col gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 text-sm border-2 border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">
                            <!-- Icon upload -->
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M7.368 9.29246C7.782 9.29246 8.118 9.62846 8.118 10.0425C8.118 10.4565 7.782 10.7925 7.368 10.7925H6.435C4.816 10.7925 3.5 12.1085 3.5 13.7265V18.6015C3.5 20.2205 4.816 21.5365 6.435 21.5365H17.565C19.183 21.5365 20.5 20.2205 20.5 18.6015V13.7175C20.5 12.1045 19.188 10.7925 17.576 10.7925H16.633C16.219 10.7925 15.883 10.4565 15.883 10.0425C15.883 9.62846 16.219 9.29246 16.633 9.29246H17.576C20.015 9.29246 22 11.2775 22 13.7175V18.6015C22 21.0475 20.01 23.0365 17.565 23.0365H6.435C3.99 23.0365 2 21.0475 2 18.6015V13.7265C2 11.2815 3.99 9.29246 6.435 9.29246H7.368ZM12.5306 2.72006L15.4466 5.64806C15.7386 5.94206 15.7376 6.41606 15.4446 6.70806C15.1506 7.00006 14.6766 7.00006 14.3846 6.70606L12.749 5.06481L12.7496 16.0394H11.2496L11.249 5.06481L9.6156 6.70606C9.4696 6.85406 9.2766 6.92706 9.0846 6.92706C8.8936 6.92706 8.7016 6.85406 8.5556 6.70806C8.2626 6.41606 8.2606 5.94206 8.5536 5.64806L11.4686 2.72006C11.7496 2.43706 12.2496 2.43706 12.5306 2.72006Z" fill="#FA6601"/>
                           </svg>

                            Upload
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 mt-1 text-sm border-2 border-gray-400 text-gray-500 rounded-md hover:bg-gray-100">
                            <!-- Icon trash -->
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
           <path d="M19.8238 9.96875C19.8238 9.96875 19.2808 16.7037 18.9658 19.5407C18.8158 20.8957 17.9788 21.6897 16.6078 21.7147C13.9988 21.7617 11.3868 21.7647 8.77881 21.7097C7.45981 21.6827 6.63681 20.8787 6.48981 19.5477C6.17281 16.6857 5.63281 9.96875 5.63281 9.96875" stroke="#878686" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M21.208 6.73828H4.25" stroke="#878686" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.9386 6.739C17.1536 6.739 16.4776 6.184 16.3236 5.415L16.0806 4.199C15.9306 3.638 15.4226 3.25 14.8436 3.25H10.6106C10.0316 3.25 9.52362 3.638 9.37362 4.199L9.13062 5.415C8.97662 6.184 8.30063 6.739 7.51562 6.739" stroke="#878686" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                            Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- Data Perusahaan -->
            <div class="space-y-4">
                <div>
                    <label class=" text-sm font-medium">Nama Perusahaan</label>
               <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">


                </div>
                <div>
                    <label class=" text-sm font-medium">Bidang Perusahaan</span></label>
                   <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">


                </div>
                <div>
                    <label class=" text-sm font-medium">Alamat Perusahaan</label>
              <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">


                </div>
            </div>
        </div>

        <!-- Garis Pemisah -->
        <hr class="my-6 border-t border-gray-300">

        <!-- Form Bagian Bawah -->

        <!-- Grid 2 kolom untuk kiri & kanan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- KIRI -->
            <div class="space-y-4">
                <!-- Badan Usaha -->
                <div>
                    <label class=" text-sm font-semibold mb-1">Badan Usaha</label>
                    <select class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                        <option>Pilih badan usaha</option>
                        <option>PT</option>
                        <option>BUMN</option>

                    </select>
                </div>
                <!-- Visi -->
                <div>
                    <label class=" text-sm font-semibold mb-1">Visi</label>
                   <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
                <!-- Deskripsi -->
                <div>
                    <label class=" text-sm font-semibold mb-1">Deskripsi</label>
                 <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
            </div>

            <!-- KANAN -->
            <div class="space-y-4">
                <!-- Website -->
                <div>
                    <label class=" text-sm font-semibold mb-1 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17 7H14C13.45 7 13 7.45 13 8C13 8.55 13.45 9 14 9H17C18.65 9 20 10.35 20 12C20 13.65 18.65 15 17 15H14C13.45 15 13 15.45 13 16C13 16.55 13.45 17 14 17H17C19.76 17 22 14.76 22 12C22 9.24 19.76 7 17 7ZM8 12C8 12.55 8.45 13 9 13H15C15.55 13 16 12.55 16 12C16 11.45 15.55 11 15 11H9C8.45 11 8 11.45 8 12ZM10 15H7C5.35 15 4 13.65 4 12C4 10.35 5.35 9 7 9H10C10.55 9 11 8.55 11 8C11 7.45 10.55 7 10 7H7C4.24 7 2 9.24 2 12C2 14.76 4.24 17 7 17H10C10.55 17 11 16.55 11 16C11 15.45 10.55 15 10 15Z"
                                fill="black" />
                        </svg>
                        Website
                    </label>
                    <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
                <!-- Email -->
                <div>
                    <label class=" text-sm font-semibold mb-1 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z"
                                fill="black" />
                        </svg>
                        Email
                    </label>
                   <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
                <!-- Whatsapp -->
                <div>
                    <label class=" text-sm font-semibold mb-1 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.0469 4.91005C18.1299 3.98416 17.0379 3.25002 15.8344 2.75042C14.6309 2.25081 13.34 1.99574 12.0369 2.00005C6.57687 2.00005 2.12688 6.45005 2.12688 11.9101C2.12688 13.6601 2.58688 15.3601 3.44688 16.8601L2.04688 22.0001L7.29688 20.6201C8.74687 21.4101 10.3769 21.8301 12.0369 21.8301C17.4969 21.8301 21.9469 17.3801 21.9469 11.9201C21.9469 9.27005 20.9169 6.78005 19.0469 4.91005ZM12.0369 20.1501C10.5569 20.1501 9.10687 19.7501 7.83687 19.0001L7.53687 18.8201L4.41688 19.6401L5.24688 16.6001L5.04688 16.2901C4.22442 14.9771 3.7878 13.4593 3.78688 11.9101C3.78688 7.37005 7.48687 3.67005 12.0269 3.67005C14.2269 3.67005 16.2969 4.53005 17.8469 6.09005C18.6145 6.85392 19.2228 7.7626 19.6365 8.76338C20.0502 9.76417 20.2611 10.8371 20.2569 11.9201C20.2769 16.4601 16.5769 20.1501 12.0369 20.1501ZM16.5569 13.9901C16.3069 13.8701 15.0869 13.2701 14.8669 13.1801C14.6369 13.1001 14.4769 13.0601 14.3069 13.3001C14.1369 13.5501 13.6669 14.1101 13.5269 14.2701C13.3869 14.4401 13.2369 14.4601 12.9869 14.3301C12.7369 14.2101 11.9369 13.9401 10.9969 13.1001C10.2569 12.4401 9.76687 11.6301 9.61687 11.3801C9.47687 11.1301 9.59687 11.0001 9.72687 10.8701C9.83687 10.7601 9.97688 10.5801 10.0969 10.4401C10.2169 10.3001 10.2669 10.1901 10.3469 10.0301C10.4269 9.86005 10.3869 9.72005 10.3269 9.60005C10.2669 9.48005 9.76687 8.26005 9.56687 7.76005C9.36687 7.28005 9.15688 7.34005 9.00688 7.33005H8.52687C8.35687 7.33005 8.09687 7.39005 7.86687 7.64005C7.64687 7.89005 7.00688 8.49005 7.00688 9.71005C7.00688 10.9301 7.89688 12.1101 8.01688 12.2701C8.13688 12.4401 9.76687 14.9401 12.2469 16.0101C12.8369 16.2701 13.2969 16.4201 13.6569 16.5301C14.2469 16.7201 14.7869 16.6901 15.2169 16.6301C15.6969 16.5601 16.6869 16.0301 16.8869 15.4501C17.0969 14.8701 17.0969 14.3801 17.0269 14.2701C16.9569 14.1601 16.8069 14.1101 16.5569 13.9901Z"
                                fill="black" />
                        </svg>
                        Whatsapp
                    </label>
                  <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
                <!-- Linkedin -->
                <div>
                    <label class=" text-sm font-semibold mb-1 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.7778 2C20.3671 2 20.9324 2.23413 21.3491 2.65087C21.7659 3.06762 22 3.63285 22 4.22222V19.7778C22 20.3671 21.7659 20.9324 21.3491 21.3491C20.9324 21.7659 20.3671 22 19.7778 22H4.22222C3.63285 22 3.06762 21.7659 2.65087 21.3491C2.23413 20.9324 2 20.3671 2 19.7778V4.22222C2 3.63285 2.23413 3.06762 2.65087 2.65087C3.06762 2.23413 3.63285 2 4.22222 2H19.7778ZM19.2222 19.2222V13.3333C19.2222 12.3727 18.8406 11.4513 18.1613 10.772C17.482 10.0927 16.5607 9.71111 15.6 9.71111C14.6556 9.71111 13.5556 10.2889 13.0222 11.1556V9.92222H9.92222V19.2222H13.0222V13.7444C13.0222 12.8889 13.7111 12.1889 14.5667 12.1889C14.9792 12.1889 15.3749 12.3528 15.6666 12.6445C15.9583 12.9362 16.1222 13.3319 16.1222 13.7444V19.2222H19.2222ZM6.31111 8.17778C6.80618 8.17778 7.28098 7.98111 7.63104 7.63104C7.98111 7.28098 8.17778 6.80618 8.17778 6.31111C8.17778 5.27778 7.34444 4.43333 6.31111 4.43333C5.81309 4.43333 5.33547 4.63117 4.98332 4.98332C4.63117 5.33547 4.43333 5.81309 4.43333 6.31111C4.43333 7.34444 5.27778 8.17778 6.31111 8.17778ZM7.85556 19.2222V9.92222H4.77778V19.2222H7.85556Z"
                                fill="black" />
                        </svg>
                        Linkedin
                    </label>
                   <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

                </div>
            </div>
        </div>

        <!-- MISI full width -->
        <div class="mt-6 space-y-3">
            <label class=" text-sm font-semibold mb-1">Misi</label>
           <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">
        <input type="text" class="w-full mt-2 border-2 border-orange-500 rounded-md p-2 focus:outline-none">

        </div>






        <!-- Tombol -->
        <div class="flex justify-end gap-3 mt-8">
            <button
                class="px-10 py-2 border-2 border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">Batal</button>
            <button class="px-8 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Simpan</button>
        </div>
    </div>

    @include('layouts.footer')
@endsection
