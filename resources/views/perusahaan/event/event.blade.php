@extends('layouts.index-perusahaan')
@section('content')
    <div class="flex flex-col gap-6 items-center justify-center min-h-screen p-6">
        @foreach ($events as $event)
            <div class="w-[800px] rounded-xl overflow-hidden relative">
                <!-- Gambar -->
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event" class="w-full h-[250px] object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-40 rounded-xl"></div>

                <!-- Konten -->
                <div class="absolute inset-0 flex flex-col justify-between p-6 text-white">
                    <!-- Tanggal (atas kanan) -->
                    <div class="text-sm text-right">
                        {{ \Carbon\Carbon::parse($event->tgl_mulai)->translatedFormat('j F Y') }}
                    </div>


                    <!-- Info -->
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $event->title }}</h2>
                        <p class="text-sm mb-3 w-[80%]">
                            {{ Str::limit(strip_tags($event->content), 120) }}
                        </p>


                        <a href="{{ route('perusahaan.event.show', $event->id) }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium px-4 py-2 rounded">
                            Lihat Lebih Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        @if ($events->isEmpty())
            <p class="text-gray-500 text-center mt-10">Belum ada event tersedia saat ini.</p>
        @endif
    </div>

    @include('layouts.footer')
@endsection
