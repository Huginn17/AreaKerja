@extends('layouts.index')
@section('content')
    <div class="bg-white text-gray-800">

        <div class="max-w-6xl mx-auto px-4 py-10">

            <!-- Header -->
            <h2 class="text-2xl font-bold mb-6">Frequently Asked Questions</h2>

            <!-- Search Bar -->
            <div class="flex items-center w-full max-w-2xl mb-10">
                <input type="text" placeholder="Apa yang bisa kami bantu?"
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                <button class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-r-md">Cari</button>
            </div>  

            <!-- FAQ Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Kolom Kiri -->
                <div class="space-y-6">
                    <div>
                        <h3 class="font-semibold mb-1">Bagaimana Melamar Pekerjaan di Area Kerja ?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Apa itu kandidat Area Kerja?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. <span
                                class="text-gray-500">Malesuada eget eu ultricies</span>.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Apa itu daftar kandidat?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Apa itu kandidat area kerja?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. <span
                                class="text-gray-500">Malesuada eget eu ultricies</span>.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Apa itu kandidat area kerja?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-6">
                    <div>
                        <h3 class="font-semibold mb-1">Apa itu Area Kerja?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Bagaimana cara melamar kerja lewat Areakerja.com ?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="text-orange-500">Viverra
                                faucibus lectus viverra id</span>. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Bagaimana cara mengganti sandi?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span
                                class="text-orange-500">Condimentum molestie dolor sit amet</span>. Lectus habitant nisl,
                            posuere at urna ut vitae hac ultricies. Commodo ridiculus augue condimentum molestie dolor,
                            morbi luctus nullam. <span class="text-gray-500">Malesuada eget eu ultricies</span>.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Bagaimana cara melamar kerja lewat Areakerja.com ?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum <span class="text-orange-500">dolor sit amet</span>, consectetur adipiscing elit.
                            Viverra faucibus lectus viverra id. Lectus habitant nisl, posuere at urna ut vitae hac
                            ultricies. Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam. Malesuada
                            eget eu ultricies.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-1">Bagaimana cara melamar kerja lewat Areakerja.com ?</h3>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra faucibus lectus viverra id.
                            Lectus habitant nisl, posuere at urna ut vitae hac ultricies. Commodo ridiculus augue
                            condimentum molestie dolor, morbi luctus nullam. <span class="text-gray-500">Malesuada eget eu
                                ultricies</span>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tombol bawah -->
            <div class="flex justify-center mt-12">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md">
                    Lihat semua FAQ →
                </button>
            </div>

        </div>

    </div>
    @include('layouts.footer')
@endsection
