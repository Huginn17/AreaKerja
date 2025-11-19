@extends('layouts.index')
@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <!-- Gambar Header -->
        <div class="mb-6">
            <img src="{{ $artikel->image ? asset('storage/' . $artikel->image) : asset('images/cwe.png') }}"
                alt="{{ $artikel->title }}" class="w-full h-72 object-cover rounded-lg shadow">
        </div>

        <!-- Label -->
        <div class="flex items-center gap-2 mb-3">
            <span class="px-7 py-1  bg-orange-500 text-white rounded-full text-sm">
                Tips
            </span>
            <span class="px-3 py-1 border border-black rounded-full text-sm">
                Top News
            </span>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-serif font-bold leading-snug">
            {{ $artikel->title }}
        </h2>

        <!-- Footer -->
        <div class="flex items-center justify-between mt-4">
            <span class="text-orange-500 font-semibold">{{ $artikel->penulis ?? 'Areakerja.com' }}</span>
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <span>{{ $artikel->created_at->translatedFormat('l, d F Y H:i') }}</span>
                <span>👁 {{ $artikel->views }}</span>
            </div>
        </div>

        <!-- Konten -->
        <div class="max-w-3xl mx-auto px-4 py-6 text-justify leading-relaxed font-medium text-gray-900">
            {!! $artikel->content !!}
        </div>

    </div>

    <!-- Floating Button -->
    <a href="#top"
        class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg">
        ↑
    </a>
    @include('layouts.footer')
@endsection
