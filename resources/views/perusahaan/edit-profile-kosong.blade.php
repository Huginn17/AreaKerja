@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white w-full rounded-lg shadow p-8">
        <!-- Judul -->
        <h2 class="text-lg font-semibold mb-6">Profil Akun</h2>

        <!-- Upload Logo -->
        <div class="grid grid-cols-3 gap-4 items-center mb-10">
            <label class="text-sm font-medium">Logo Perusahaan <span class="text-red-500">*</span></label>
            <div class="col-span-2 flex items-center space-x-4">
                <div class="w-48 h-32 border border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="object-cover">
                </div>
                <div class="flex flex-col gap-y-6">
                    <button
                        class="flex items-center gap-3 px-6 py-2 text-sm border rounded-md text-orange-500 border-orange-500 hover:bg-orange-50">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.70151 4.04985L6.00476 2.64706V8.49608C6.00476 8.65783 6.06472 8.81297 6.17145 8.92735C6.27818 9.04173 6.42293 9.10598 6.57387 9.10598C6.72481 9.10598 6.86956 9.04173 6.97629 8.92735C7.08302 8.81297 7.14297 8.65783 7.14297 8.49608V2.64706L8.44623 4.04985C8.49913 4.10701 8.56208 4.15239 8.63143 4.18335C8.70078 4.21431 8.77516 4.23026 8.85029 4.23026C8.92542 4.23026 8.99981 4.21431 9.06916 4.18335C9.13851 4.15239 9.20145 4.10701 9.25436 4.04985C9.3077 3.99315 9.35004 3.92569 9.37893 3.85137C9.40782 3.77705 9.4227 3.69733 9.4227 3.61681C9.4227 3.5363 9.40782 3.45658 9.37893 3.38226C9.35004 3.30793 9.3077 3.24048 9.25436 3.18378L6.97793 0.744145C6.92381 0.688618 6.85999 0.645092 6.79013 0.616064C6.65157 0.555062 6.49616 0.555062 6.35761 0.616064C6.28775 0.645092 6.22393 0.688618 6.1698 0.744145L3.89338 3.18378C3.84032 3.24064 3.79823 3.30815 3.76951 3.38246C3.74079 3.45676 3.72601 3.53639 3.72601 3.61681C3.72601 3.69723 3.74079 3.77687 3.76951 3.85117C3.79823 3.92547 3.84032 3.99298 3.89338 4.04985C3.94644 4.10671 4.00944 4.15182 4.07877 4.1826C4.1481 4.21338 4.2224 4.22922 4.29745 4.22922C4.37249 4.22922 4.4468 4.21338 4.51613 4.1826C4.58545 4.15182 4.64845 4.10671 4.70151 4.04985ZM11.6958 6.66635C11.5449 6.66635 11.4001 6.73061 11.2934 6.84499C11.1867 6.95937 11.1267 7.1145 11.1267 7.27626V10.9357C11.1267 11.0975 11.0668 11.2526 10.96 11.367C10.8533 11.4814 10.7085 11.5456 10.5576 11.5456H2.59013C2.43919 11.5456 2.29444 11.4814 2.18771 11.367C2.08098 11.2526 2.02102 11.0975 2.02102 10.9357V7.27626C2.02102 7.1145 1.96106 6.95937 1.85434 6.84499C1.74761 6.73061 1.60285 6.66635 1.45192 6.66635C1.30098 6.66635 1.15623 6.73061 1.0495 6.84499C0.942772 6.95937 0.882813 7.1145 0.882812 7.27626V10.9357C0.882813 11.421 1.06269 11.8864 1.38287 12.2295C1.70306 12.5727 2.13732 12.7654 2.59013 12.7654H10.5576C11.0104 12.7654 11.4447 12.5727 11.7649 12.2295C12.085 11.8864 12.2649 11.421 12.2649 10.9357V7.27626C12.2649 7.1145 12.205 6.95937 12.0982 6.84499C11.9915 6.73061 11.8468 6.66635 11.6958 6.66635Z"
                                fill="#FA6601" />
                        </svg>
                        Upload
                    </button>
                    <button class="flex items-center gap-3 px-6 py-2 text-sm border rounded-md text-gray-500 border-gray-300 hover:bg-gray-100">
                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.7907 2.77852H9.4194V2.30947C9.4194 1.93628 9.2695 1.57837 9.00268 1.31448C8.73586 1.05059 8.37397 0.902344 7.99663 0.902344H5.1511C4.77376 0.902344 4.41188 1.05059 4.14506 1.31448C3.87824 1.57837 3.72834 1.93628 3.72834 2.30947V2.77852H1.35707C1.23129 2.77852 1.11066 2.82793 1.02172 2.9159C0.932779 3.00386 0.882813 3.12316 0.882812 3.24756C0.882813 3.37196 0.932779 3.49126 1.02172 3.57922C1.11066 3.66719 1.23129 3.7166 1.35707 3.7166H1.83132V12.1594C1.83132 12.4082 1.93125 12.6468 2.10913 12.8227C2.28701 12.9986 2.52827 13.0975 2.77983 13.0975H10.3679C10.6195 13.0975 10.8607 12.9986 11.0386 12.8227C11.2165 12.6468 11.3164 12.4082 11.3164 12.1594V3.7166H11.7907C11.9165 3.7166 12.0371 3.66719 12.126 3.57922C12.215 3.49126 12.2649 3.37196 12.2649 3.24756C12.2649 3.12316 12.215 3.00386 12.126 2.9159C12.0371 2.82793 11.9165 2.77852 11.7907 2.77852ZM4.67685 2.30947C4.67685 2.18508 4.72682 2.06577 4.81576 1.97781C4.9047 1.88985 5.02532 1.84043 5.1511 1.84043H7.99663C8.12241 1.84043 8.24304 1.88985 8.33198 1.97781C8.42092 2.06577 8.47089 2.18508 8.47089 2.30947V2.77852H4.67685V2.30947ZM10.3679 12.1594H2.77983V3.7166H10.3679V12.1594ZM5.62536 6.06182V9.81416C5.62536 9.93856 5.57539 10.0579 5.48645 10.1458C5.39751 10.2338 5.27689 10.2832 5.1511 10.2832C5.02532 10.2832 4.9047 10.2338 4.81576 10.1458C4.72682 10.0579 4.67685 9.93856 4.67685 9.81416V6.06182C4.67685 5.93742 4.72682 5.81812 4.81576 5.73015C4.9047 5.64219 5.02532 5.59278 5.1511 5.59278C5.27689 5.59278 5.39751 5.64219 5.48645 5.73015C5.57539 5.81812 5.62536 5.93742 5.62536 6.06182ZM8.47089 6.06182V9.81416C8.47089 9.93856 8.42092 10.0579 8.33198 10.1458C8.24304 10.2338 8.12241 10.2832 7.99663 10.2832C7.87085 10.2832 7.75022 10.2338 7.66128 10.1458C7.57234 10.0579 7.52238 9.93856 7.52238 9.81416V6.06182C7.52238 5.93742 7.57234 5.81812 7.66128 5.73015C7.75022 5.64219 7.87085 5.59278 7.99663 5.59278C8.12241 5.59278 8.24304 5.64219 8.33198 5.73015C8.42092 5.81812 8.47089 5.93742 8.47089 6.06182Z"
                                fill="#606060" />
                        </svg>
                        Remove
                    </button>
                </div>
            </div>
        </div>

        <!-- Form Profil -->
        <div class="space-y-10">
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Alamat Perusahaan <span class="text-red-500">*</span></label>
                <input type="text" placeholder=""
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Bidang Usaha <span class="text-red-500">*</span></label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-start">
                <label class="text-sm font-medium mt-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Visi<span class="text-red-500 ml-1">*</span></label>
                <input type="text"
                    class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-start">
                <label class="text-sm font-medium mt-2">Misi<span class="text-red-500 ml-1">*</span></label>
                <textarea class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>
        </div>
        <hr class="border border-gray-200 mt-10">
        <!-- Kontak -->
        <h2 class="text-lg font-semibold mt-8 mb-6">Kontak</h2>
        <div class="space-y-10">
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Website</label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Telepon</label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Whatsapp</label>
                <input type="text"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <label class="text-sm font-medium">Email</label>
                <input type="email"
                    class="border border-gray-300 rounded-md flex w-[89%] h-11 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 mt-8">
            <button class="px-6 py-2 border  rounded-md text-gray-600 border-gray-300 hover:bg-gray-100">Batal</button>
            <button class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Simpan</button>
        </div>
    </div>


    @include('layouts.footer')
@endsection
