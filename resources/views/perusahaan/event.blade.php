@extends('layouts.index-perusahaan')
@section('content')
    <div class=" flex flex-col gap-6 items-center justify-center min-h-screen p-6">

        <div class=" mx-auto">
            <!-- Date -->
            <div class="text-sm">7 Juli 2023</div>
            <!-- Card 1 -->
            <div class="w-[800px] rounded-xl overflow-hidden relative">
                <!-- Background Image -->
                <img src="{{ asset('images/megangbuku.jpg') }}" alt="Event" class="w-full h-[250px] object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-40 rounded-xl"></div>

                <!-- Content -->
                <div class="absolute inset-0 flex flex-col justify-between p-6 text-white">

                    <!-- Info -->
                    <div class="mt-20">
                        <h2 class="text-2xl font-bold mb-2">Event</h2>
                        <p class="text-sm mb-3 w-[80%]">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                        <a href="{{ url('/perusahaan/gabung/event') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium px-4 py-2 rounded">
                            Bergabung
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <!-- Card 2 -->
            <div class="w-[800px] rounded-xl overflow-hidden relative">
                <!-- Background Image -->
                <img src="{{ asset('images/rapat.jpg') }}" alt="Event" class="w-full h-[250px] object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-40 rounded-xl"></div>

                <!-- Content -->
                <div class="absolute inset-0 flex flex-col justify-between p-6 text-white">
                    <!-- Date (kanan atas) -->
                    <div class="text-sm text-right">7 Juli 2023</div>

                    <!-- Info -->
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Event</h2>
                        <p class="text-sm mb-3 w-[80%]">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                        <button class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium px-4 py-2 rounded">
                            Bergabung
                        </button>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.footer')
    @endsection
