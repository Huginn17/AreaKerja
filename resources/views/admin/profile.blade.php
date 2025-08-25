@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold">Profile</h1>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-gray-800  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/ohim.jpg') }}" alt="Logo" class="w-15 h-12 pr-2   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Dj Ohim </p>
                        <p class="text-xs text-gray-500">ohim@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>


        <div class="flex items-center justify-center min-h-screen">

            <div class="p-6 rounded-lg border border-gray-300 w-[750px]">
                {{-- header --}}
                <h2 class="text-lg font-semibold mb-4">Edit Profile</h2>


                {{-- profiile --}}
                <div class="flex items-center gap-4 m-6">
                    <img src="{{ asset('images/ohim.jpg') }}" class="w-20 h-20 rounded-full" alt="profile">
                    <div>
                        <h3 class="font-semibold">DJ Ohim</h3>
                        <p class="text-sm text-gray-500">Lutung@gmail.com</p>
                    </div>
                </div>


                {{-- form --}}
                <form action="#" method="POST" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        {{-- email --}}
                        <div>
                            <label class="block mb-1 text-sm font-medium" for="">Email</label>
                            <input type="email" class="w-full p-2 border rounded-lg text-sm " placeholder="Email">
                        </div>
                        {{-- username --}}
                        <div>
                            <label for="" class="block mb-1 text-sm font-medium">Username</label>
                            <input type="text" class="w-full p-2 border rounded-lg text-sm" placeholder="Username">
                        </div>
                    </div>

                    {{-- nama lengkap --}}
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                        <input type="text" class="w-[340px] p-2 border rounded-lg text-sm" placeholder="Nama Lengkap">
                    </div>

                    {{-- provinsi,kota,kec --}}
                    <div class="flex">
                        <div class="mr-[25px]">
                            <label for="" class="block mb-1 text-sm font-medium">Provinsi</label>
                            <select name="provinsi" id=""
                                class="border rounded-lg w-48 px-2 py-2 text-sm text-gray-500 ">
                                <option selected>Yogyakarta</option>
                                <div class="text-gray-800">
                                    <option value="">Jawa Tengah</option>
                                </div>
                            </select>
                        </div>
                        <div class="mr-[25px]">
                            <label for="" class="block mb-1 mr-10 text-sm font-medium">Kota/Kabupaten</label>
                            <select name="kota" id=""
                                class="border rounded-lg w-full py-2 px-2 text-sm text-gray-500">
                                <option selected class="text-left">Sleman</option>
                                <option value="">Banjar</option>
                            </select>
                        </div>

                        <div>
                            <label for="" class="block mb-1 mr-10 text-sm font-medium">Kecamatan</label>
                            <select name="kota" id=""
                                class="border rounded-lg w-full py-2 px-2 text-sm text-gray-500">
                                <option selected class="text-left">Maguwohrjo</option>
                                <option value="">Depok</option>
                            </select>
                        </div>
                    </div>

                    {{-- desa dan kode pos --}}
                    <div class="flex">
                        <div class="mr-2">
                            <label class="block mb-1 text-sm font-medium">Desa</label>
                            <input type="text" class="w-full p-2 border rounded-lg text-sm" placeholder="-">
                        </div>
                        <div class="ml-5">
                            <label class="block mb-1 text-sm font-medium">Kode Pos</label>
                            <input type="text" value="63131" class="w-[160px] p-2 border rounded-lg text-sm" />
                        </div>
                    </div>

                    {{-- detail --}}
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium">Detail Lainnya</label>
                        <input type="text" class="w-full p-2 border rounded-lg text-sm" placeholder="Detail Lainnya">
                    </div>

                    {{-- button --}}
                    <div class="flex justify-center mt-4">
                        <button type="button" class="bg-gray-700 text-white px-6 py-2 rounded-lg">Edit</button>
                    </div>
            </div>


            </form>
        </div>


    </div>


    </div>
@endsection
