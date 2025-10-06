@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-900">
        <div class="max-w-3xl mx-auto p-6">
            <!-- Tanggal -->
            <div class="text-sm font-medium text-gray-800 mb-2">
                {{ \Carbon\Carbon::parse($event->tgl_mulai)->translatedFormat('d F Y') }}
            </div>

            <!-- Gambar -->
            <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default.jpg') }}"
                alt="{{ $event->title }}" class="w-full rounded-xl mb-4">

            <!-- Judul & Deskripsi -->
            <h2 class="text-lg font-bold mb-2">{{ $event->title }}</h2>
            <p class="text-sm text-gray-700 mb-4">
                {!! $event->content !!}
            </p>


            <hr class="my-4">

            <!-- Detail acara -->
            <h3 class="text-base font-semibold text-orange-600 mb-3">Detail Acara</h3>
            <div class="flex flex-wrap gap-8 mb-6">
                <!-- Waktu -->
                <div class="flex flex-col space-y-2">
                    <div class="flex items-start">
                        <span class="mr-3 mt-[2px]">
                            🕒
                        </span>
                        <div>
                            <p class="font-semibold">Waktu:</p>
                            <p>
                                {{ \Carbon\Carbon::parse($event->tgl_mulai)->translatedFormat('d F Y') }}
                                ({{ $event->jam_mulai }} - {{ $event->jam_akhir }}) WIB
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <span class="mr-3 mt-[2px]">📍</span>
                        <div>
                            <p class="font-semibold">Lokasi:</p>
                            <p>{{ $event->lokasi ?? 'Belum ditentukan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar kegiatan -->
            <h3 class="text-base font-semibold mb-2">Daftar Kegiatan:</h3>
            @if ($event->kegiatan->count() > 0)
                <div class="border-2 border-orange-500 rounded-xl overflow-hidden">
                    <table class="w-full border-orange-500 text-sm">
                        <thead>
                            <tr>
                                <th class="border border-orange-500 px-4 py-2 w-[20%] text-center">Waktu</th>
                                <th class="border border-orange-500 px-4 py-2 text-center">Acara</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->kegiatan as $kegiatan)
                                <tr>
                                    <td class="border border-orange-500 px-4 py-2 text-center">{{ $kegiatan->waktu }}</td>
                                    <td class="border border-orange-500 px-4 py-2 text-center">{{ $kegiatan->kegiatan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 italic">Belum ada daftar kegiatan.</p>
            @endif
        </div>

        @include('layouts.footer')
    </div>
@endsection
